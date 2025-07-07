<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class SponsorController extends Controller
{


    public function __construct()
    {

    }

    public function index()
    {
        if (!Gate::allows('sponsors-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Sponsor ']);
        return view('dashboard.settings.sponsor.index', $data);
    }


    public function create()
    {
        if (!Gate::allows('sponsors-create')) {
            return abort(401);
        }
        return View::make('dashboard.settings.sponsor.modals.modal_body_create')->render();

    }

    public function getSponsorListJson()
    {
        if (!Gate::allows('sponsors-view')) {
            return abort(401);
        }
        try {
            $sponsors = Sponsor::query();
            return DataTables::of($sponsors)
                ->addIndexColumn()
                ->addColumn('action', function ($sponsor) {
                    $edit_link="";
                    $delete_link="";
                    if (Gate::allows('sponsors-edit')) {
                        $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-sponsor-edit-button" data-url="' . route('sponsor.edit', SRS::encode($sponsor->id)) . '"');
                    }
                    if (Gate::allows('sponsors-delete')) {
                        $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Sponsor =>" . $sponsor->sponsor_name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('sponsor.destroy', SRS::encode($sponsor->id)) . "'>"
                        . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                        . "</a>";
                    }
                  
                    $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
                    return $action;
                })->escapeColumns('action')
                ->make(true);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
    }


    public function store(Request $request)
    {
        if (!Gate::allows('sponsors-create')) {
            return abort(401);
        }
        $rules = [
            'sponsor_name' => 'required|string|min:3'
        ];
        $messages = [
            'sponsor_name.required' => 'Sponsor name required',
            'sponsor_name.string' => 'Sponsor name must be a list of characters',
            'sponsor_name.min' => 'The Bath name must be at least 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {
            Sponsor::create($input);

            return back()->with("message", 'Sponsor created successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'A system error occurred ' . $ex->getMessage());
        }

    }

    public function show($id)
    {
        if (!Gate::allows('sponsors-view')) {
            return abort(401);
        }
        $category = Sponsor::find($id);
        if (!$category) {
            //  return $this->sendError('Ticket Category Not Found');
        }

        // return $this->sendResponse(new TicketCategoryResource($category), 'Ticket Category Retrieved Successfully');

    }

    public function edit($id)
    {
        if (!Gate::allows('sponsors-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $sponsor = Sponsor::find($id);
        $data['sponsor'] = $sponsor;
        return View::make('dashboard.settings.sponsor.modals.modal_body_edit', $data)->render();

    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('sponsors-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $sponsor = Sponsor::find($id);
        if (!$sponsor) {
            return back()->withInput()->with('Sponsor not found');
        }
        $rules = [
            'sponsor_name' => 'required|string|min:3'
        ];
        $messages = [
            'sponsor_name.required' => 'Sponsor Name Required',
            'sponsor_name.string' => 'Sponsor name must be a list of characters',
            'sponsor_name.min' => 'The Sponsor name Must be at leas 5 characters'
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {

            $sponsor->update($input);

            return back()->with('message', 'Sponsor  updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    public function destroy($id)
    {
        if (!Gate::allows('sponsors-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $sponsor = Sponsor::find($id);

        if (!$sponsor) {
            return response()->json('Sponsor   Not Found');
        }

        if ($sponsor->delete()) {
            return response()->json("Sponsor (" . $id . ')  Sponsor has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }


}
