<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class AttachmentController extends Controller
{


    public function __construct()
    {


    }

    public function index()
    {
        if (! Gate::allows('attachments-view')) {
            return abort(401);
        }

        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Attachment ']);
        return view('dashboard.settings.attachments.index', $data);
    }


    public function create()
    {
        if (! Gate::allows('attachments-create')) {
            return abort(401);
        }

        return View::make('dashboard.settings.attachments.modals.modal_body_create')->render();

    }

    public function getAttachmentJson()
    {
        if (! Gate::allows('attachments-view')) {
            return abort(401);
        }

        try {
            $attachments = Attachment::query();
            return DataTables::of($attachments)
                ->addIndexColumn()
                ->addColumn('action', function ($attachment) {
                    $edit_link="";
                    $delete_link="";
                    if (Gate::allows('attachments-edit')) {
                        $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-attachment-edit-button" data-url="' . route('attachments.edit', SRS::encode($attachment->id)) . '"');
                      
                    }
                    if (Gate::allows('attachments-delete')) {
                        $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Attachment =>" . $attachment->name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('attachments.destroy', SRS::encode($attachment->id)) . "'>"
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
        if (! Gate::allows('attachments-create')) {
            return abort(401);
        }

        $rules = [
            'attachments_name' => 'required|string|min:3'
        ];
        $messages = [
            'attachments_name.required' => 'Attachment name required',
            'attachments_name.string' => 'Attachment name must be a list of characters',
            'attachments_name.min' => 'The Bath name must be at least 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {
            Attachment::create($input);

            return back()->with("message", 'Attachment created successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'A system error occurred ' . $ex->getMessage());
        }

    }

    public function show($id)
    {
        if (! Gate::allows('attachments-view')) {
            return abort(401);
        }

        $category = Attachment::find($id);
        if (!$category) {
            //  return $this->sendError('Ticket Category Not Found');
        }

        // return $this->sendResponse(new TicketCategoryResource($category), 'Ticket Category Retrieved Successfully');

    }

    public function edit($id)
    {
        if (! Gate::allows('attachments-edit')) {
            return abort(401);
        }

        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $attachments = Attachment::find($id);
        $data['attachments'] = $attachments;

        return View::make('dashboard.settings.attachments.modals.modal_body_edit', $data)->render();

    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('attachments-edit')) {
            return abort(401);
        }

        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $attachments = Attachment::find($id);
        if (!$attachments) {
            return back()->withInput()->with('Attachment not found');
        }
        $rules = [
            'attachments_name' => 'required|string|min:3'
        ];
        $messages = [
            'attachments_name.required' => 'Attachment Name Required',
            'attachments_name.string' => 'Attachment name must be a list of characters',
            'attachments_name.min' => 'The Attachment name Must be at leas 5 characters'
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {

            $attachments->update($input);

            return back()->with('message', 'Attachment  updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    public function destroy($id)
    {
        if (! Gate::allows('attachments-delete')) {
            return abort(401);
        }

        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $attachments = Attachment::find($id);

        if (!$attachments) {
            return response()->json('Attachment   Not Found');
        }

        if ($attachments->delete()) {
            return response()->json("Attachment (" . $id . ')  Attachment has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }


}
