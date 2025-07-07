<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use View;
use Yajra\DataTables\DataTables;
use SRS;
class StudyLevelController extends Controller
{


    public function __construct()
    {


    }

    public function index()
    {
        if (!Gate::allows('study_levels-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Study Levels']);
        return view('dashboard.settings.study-level.index', $data);
    }


    public function create()
    {
        if (!Gate::allows('study_levels-create')) {
            return abort(401);
        }
        return View::make('dashboard.settings.study-level.modals.modal_body_create')->render();

    }

    public function getStudyLevelJson()
    {
        if (!Gate::allows('study_levels-view')) {
            return abort(401);
        }
        try {
            $levels = StudyLevel::query();
            return DataTables::of($levels)
                ->addIndexColumn()
                // ->editColumn('level_name', function ($g) {
                //     return link_to(route('grades.index', SRS::encode($g->id)), $g->level_name);
                // })
                  ->addColumn('grade_configuration',function ($g){
                    return html_entity_decode(link_to(route('grades.index', SRS::encode($g->id)),'<i class="fa fa fa-cogs pl-2"></i> Grade Configuration ['. $g->level_name.']'));

                })
                // ->addColumn('gpa_classification',function ($g){
                //     return html_entity_decode(link_to(route('gpa-classifications.index', SRS::encode($g->id)),'<i class="fa fa fa-cogs pl-2"></i> Configure GPA Classification ['. $g->level_name.']'));

                // })
                ->addColumn('action', function ($level) {
                    $edit_link="";
                    $delete_link="";
                    if (Gate::allows('study_levels-edit')) {
                        $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-level-edit-button" data-url="' . route('study-level.edit', SRS::encode($level->id)) . '"');
                    }

                    if (Gate::allows('study_levels-delete')) {
                        $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Level =>" . $level->level_name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('study-level.destroy', SRS::encode($level->id)) . "'>"
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
        if (!Gate::allows('study_levels-create')) {
            return abort(401);
        }
        $rules = [
            'level_name' => 'required|string|min:3'
        ];
        $messages = [
            'level_name.required' => 'Level name required',
            'level_name.string' => 'Level name must be a list of characters',
            'level_name.min' => 'The Level name must be at least 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {
            StudyLevel::create($input);

            return back()->with("message", 'Level created successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'A system error occurred ' . $ex->getMessage());
        }

    }

    public function show($id)
    {
        if (!Gate::allows('study_levels-view')) {
            return abort(401);
        }
        $category = StudyLevel::find($id);
        if (!$category) {
            //  return $this->sendError('Ticket Category Not Found');
        }

        // return $this->sendResponse(new TicketCategoryResource($category), 'Ticket Category Retrieved Successfully');

    }

    public function edit($id)
    {
        if (!Gate::allows('study_levels-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $level = StudyLevel::find($id);
        $data['level'] = $level;
        return View::make('dashboard.settings.study-level.modals.modal_body_edit', $data)->render();

    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('study_levels-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $level = StudyLevel::find($id);
        if (!$level) {
            return back()->withInput()->with('Sponsor not found');
        }
        $rules = [
            'level_name' => 'required|string|min:3'
        ];
        $messages = [
            'level_name.required' => 'Level Name Required',
            'level_name.string' => 'Level name must be a list of characters',
            'level_name.min' => 'The Level name Must be at leas 5 characters'
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
        $input['year_id']=Auth::user()->staff->year_id;
        try {

            $level->update($input);

            return back()->with('message', 'Study level  updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    public function destroy($id)
    {
        if (!Gate::allows('study_levels-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $level = StudyLevel::find($id);

        if (!$level) {
            return response()->json('StudyLevel   Not Found');
        }

        if ($level->delete()) {
            return response()->json("Study Level (" . $id . ')  StudyLevel has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }


}
