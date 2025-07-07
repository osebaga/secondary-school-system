<?php

namespace App\Http\Controllers;

use App\Helpers\SRS as HelpersSRS;
use App\Models\Campus;
use App\Models\Center;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\View as FacadesView;
use Validator;
use Yajra\DataTables\DataTables;
class CenterController extends Controller
{
    public function index()
    {
        if (! Gate::allows('center-view')) {
            return abort(401);
        }

        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings / Centers']);

        $data['campuses'] = Campus::with('centers')->get();
        return view('dashboard.settings.centers.index', $data);


    }


    public function create()
    {
        if (! Gate::allows('center-create')) {
            return abort(401);
        }
         $campus=Campus::all();
         $campuses['']='';
         foreach ($campus as $cam){
             $campuses[$cam->id]=$cam->campus_name;
         }
        $data['campuses']=$campuses;

        return FacadesView::make('dashboard.settings.centers.modals.modal_body_create',$data)->render();

    }


    public function store(Request $request)
    {
        if (! Gate::allows('center-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = FacadesValidator::make($input, [
            'campus_id' => 'required',
            'center_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }

        Center::create($input);
        return back()->with('message', 'Center Added Successfully !!');

    }


    public function edit($id)
    {
        if (! Gate::allows('center-edit')) {
            return abort(401);
        }
        try {
            $id = HelpersSRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        $insts = campus::all();
        $campuss['']='';
        foreach ($insts as $campus) {

        $campuss[$campus->id] = $campus->campus_name;
       }
        $data['campuss']=$campuss;
        $campus = Campus::find($id);
        $data['campus'] = $campus;

        return FacadesView::make('dashboard.settings.centers.modals.modal_body_edit', $data)->render();



    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('center-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = FacadesValidator::make($input, [
            'campus_id' => 'required',
            'center_name' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
       
        $data=[
            'campus_id' => $input['campus_id'],
            'center_name' => $input['center_name'],
            'address' =>$input['address'],
            'telephone' =>$input['telephone'],
            'email' =>$input['email'],
        ];
        Center::where('id',$id)->update($data);
        return back()->with('message', 'Center Updated Successfully !!');

    }

    public function destroy($id)
    {
        if (! Gate::allows('center-delete')) {
            return abort(401);
        }
        try {
            $id = HelpersSRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $cent = Center::find($id);

        if (!$cent) {
            return response()->json('Center Not Found');
        }

        if ($cent->delete()) {
            return response()->json("Center (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }


}
