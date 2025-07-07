<?php

namespace App\Http\Controllers\accommodations;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\Block;
use App\Models\Room;
use App\Models\AcademicYear;
use App\Models\Criteria;
use App\Models\Roomapplication;
use App\Models\Allocation;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class AccommodationController extends Controller
{
    public function index()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Applications']];
        $data['applications'] = Roomapplication::where('status', 0)->get();
        return view('dashboard.accommodations.applications.roomapplications', $data);
    }

    public function registerhostel()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Hostel']];
        return view('dashboard.accommodations.hostelregister', $data);
    }

    public function viewhostel()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Hostel']];
        $data['hostels'] = Hostel::all();
        return view('dashboard.accommodations.hostelindex', $data);
    }

    public function posthostel(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'code' => 'required',
            'hostel_name' => 'required',
            'location' => 'required',
            'hostel_capacity' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('errors', $validator->errors());
        } else {
            Hostel::create($inputs);
            return back()->with('message', 'Hostel added successfully');
        }
    }

    public function registerblock()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Blocks']];
        $data['hostel'] = Hostel::all();
        return view('dashboard.accommodations.blockregister', $data);
    }

    public function postblock(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'hostel_id' => 'required',
            'block_name' => 'required',
            'block_capacity' => 'required',
            'number_of_room' => 'required',
            'number_of_floor' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('errors', $validator->errors());
        } else {
            Block::create($inputs);
            return back()->with('message', 'Block added successfully');
        }
    }

    public function viewblock()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Hostel']];
        $data['block'] = Block::all();
        $data['blocks'] = Block::join('hostels', 'hostels.id', '=', 'blocks.hostel_id')->get();
        return view('dashboard.accommodations.blockindex', $data);
    }

    public function deleteblock(Request $request)
    {
        Block::where('id', $request->id)->delete();
        return redirect()
            ->back()
            ->with('message', 'Block deleted successfully');
    }

    public function addroom()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Room']];
        $data['hostels'] = Hostel::all();
        $data['blocks'] = Block::all();
        return view('dashboard.accommodations.roomregister', $data);
    }

    public function postroom(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'hostel_id' => 'required',
            'block_id' => 'required',
            'room_number' => 'required',
            'floor_name' => 'required',
            'capacity' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('errors', $validator->errors());
        } else {
            Room::create($inputs);
            return back()->with('message', 'Room registered successfully');
        }
    }

    public function viewroom()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Room']];
        $data['rooms'] = Room::join('hostels', 'hostels.id', '=', 'rooms.hostel_id')
            ->join('blocks', 'blocks.id', '=', 'rooms.block_id')
            ->get();
        return view('dashboard.accommodations.roomindex', $data);
    }

    public function roomapplication()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Room']];
        $data['academics'] = AcademicYear::all();
        $data['criteria'] = Criteria::all();
        return view('dashboard.accommodations.applicationform', $data);
    }

    public function storeroomapplication(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'reg_no' => 'required',
            'year_id' => 'required',
            'criteria_id' => 'required',
            'reason' => 'required|max:50',
            'received' => Carbon::now(),
            // 'status' => 'required',
            'processed' => Carbon::now(),
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('errors', $validator->errors());
        } else {
            Roomapplication::create($inputs);
            return back()->with('message', 'Successfully submitted');
        }
    }

    public function showVacantRooms()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Vacant Rooms']];

        $data['rooms'] = Room::join('hostels', 'hostels.id', '=', 'rooms.hostel_id')
            ->join('blocks', 'blocks.id', '=', 'rooms.block_id')
            ->leftJoin('allocations', 'rooms.id', '=', 'allocations.room_id')
            ->groupBy('rooms.id')
            ->selectRaw('rooms.*,blocks.*,hostels.*, COUNT(allocations.id) as allocations')
            ->get();

        return view('dashboard.accommodations.vacancyroom', $data);
    }

    # Allocations
    public function getCurrentAllocations()
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Current Allocation']];
        try {
            $data['allocations'] = Allocation::join('hostels', 'hostels.id', '=', 'allocations.hostel_id')
                ->join('rooms', 'rooms.id', '=', 'allocations.room_id')
                ->join('blocks', 'blocks.id', '=', 'rooms.block_id')
                ->join('academic_years', 'academic_years.id', '=', 'allocations.year_id')
                ->get();

            if ($data['allocations']->isEmpty()) {
                return redirect()
                    ->back()
                    ->with('error', 'Currently no Allocations found');
            } else {
                return view('dashboard.accommodations.currentallocation', $data);
            }
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong');
        }
    }

    public function getAllocationForm($reg_no)
    {
        $data['bc'] = $data['bc'] = [['link' => '#', 'page' => 'Dashboard/Room Allocation']];

        try {
            $data['reg_no'] = Crypt::decrypt($reg_no);

            $year_id = Roomapplication::where('reg_no', $data['reg_no'])
                ->pluck('year_id')
                ->first();

            $data['application_year'] = AcademicYear::where('id', $year_id)->first();

            $data['hostels'] = Hostel::all();

            $data['rooms'] = Room::join('blocks', 'blocks.id', '=', 'rooms.block_id')
                ->leftJoin('allocations', 'rooms.id', '=', 'allocations.room_id')
                ->groupBy('rooms.id')
                ->selectRaw('rooms.*,blocks.block_name, COUNT(allocations.id) as allocations')
                ->get();

            return view('dashboard.accommodations.allocationform', $data);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Oops... Something Went Wrong');
        }
    }

    public function storeAllocation(Request $request)
    {
        $allocationData = $request->all();

        $validator = Validator::make($allocationData, [
            'hostel_id' => 'required',
            'room_id' => 'required',
            'reg_no' => 'required',
            'year_id' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);

        try {
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->with('errors', $validator->errors());
            } else {
                Allocation::create([
                    'hostel_id' => $allocationData['hostel_id'],
                    'room_id' => $allocationData['room_id'],
                    'reg_no' => $allocationData['reg_no'],
                    'year_id' => $allocationData['year_id'],
                    'check_in' => $allocationData['check_in'],
                    'check_out' => $allocationData['check_out'],
                ]);
                Roomapplication::where('reg_no', $allocationData['reg_no'])->update(['status' => 1]);

                return back()->with('message', $allocationData['reg_no'] . ' ' . 'Successfully Allocated');
            }
        } catch (Exception $e) {
            return back()
                ->withInput()
                ->with('message', 'Make sure the Student is not previously Allocated');
        }
    }

    
}
