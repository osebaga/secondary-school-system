<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;

use App\Models\ExamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class ExamCategoryController extends Controller
{


    public function __construct()
    {


    }

    public function index()
    {
        if (! Gate::allows('exam-categories-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Exam Category']);
        return view('dashboard.settings.exam-category.index', $data);
    }


    public function create()
    {
        if (! Gate::allows('exam-categories-create')) {
            return abort(401);
        }
        return View::make('dashboard.settings.exam-category.modals.modal_body_create')->render();

    }

    public function getExamCategoryJson()
    {
        if (! Gate::allows('exam-categories-view')) {
            return abort(401);
        }
        try {
            $cat = ExamCategory::query();
            return DataTables::of($cat)
                ->addIndexColumn()
                ->addColumn('action', function ($c) {
                    $edit_link = "";
                    $delete_link = "";
                    if(Gate::allows('exam-categories-edit')){
                    $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-exam-cat-edit-button" data-url="' . route('exam-category.edit', SRS::encode($c->id)) . '"');
                    }
                    if(Gate::allows('exam-categories-delete'))
                    {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $c->name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('exam-category.destroy', SRS::encode($c->id)) . "'>"
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
        if (! Gate::allows('exam-categories-create')) {
            return abort(401);
        }
        $rules = [
            'name' => 'required|string|min:3',
            // 'type' =>'required',
            'code' =>'required'
        ];
        $messages = [
            // 'type.required' => 'Exam Type  required',
            'code.required' => 'Exam Code  required',
            'name.required' => 'Exam Category  name required',
            'name.string' => 'Exam Category  name must be a list of characters',
            'name.min' => 'The Exam Category  name must be at least 3 characters'
        ];

        $this->validate($request, $rules, $messages);

        $input=$request->all();
       // dd($input);
        //$input['year_id']=Auth::user()->staff->year_id;
        try {
            ExamCategory::create($input);

            return back()->with("message", 'ExamCategory created successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'A system error occurred ' . $ex->getMessage());
        }

    }

    public function show($id)
    {
        if (! Gate::allows('exam-categories-view')) {
            return abort(401);
        }
        $category = ExamCategory::find($id);
        if (!$category) {
            //  return $this->sendError('Ticket Category Not Found');
        }

        // return $this->sendResponse(new TicketCategoryResource($category), 'Ticket Category Retrieved Successfully');

    }

    public function edit($id)
    {
        if (! Gate::allows('exam-categories-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $cat= ExamCategory::find($id);
        $data['cat'] = $cat;

        return View::make('dashboard.settings.exam-category.modals.modal_body_edit', $data)->render();

    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('exam-categories-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $cat= ExamCategory::find($id);
        if (!$cat) {
            return back()->withInput()->with('ExamCategory not found');
        }
        $rules = [
            'name' => 'required|string|min:3',
            // 'type' =>'required',
            'code' =>'required'
        ];
        $messages = [
            // 'type.required' => 'Exam Type  Required',
            'code.required' => 'Exam Code  Required',
            'name.required' => 'Exam Category Name Required',
            'name.string' => 'Exam Category  name must be a list of characters',
            'name.min' => 'The Exam Category  name Must be at leas 5 characters'
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
       // $input['year_id']=Auth::user()->staff->year_id;
        try {

            $cat->update($input);

            return back()->with('message', 'Exam Category  updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    public function destroy($id)
    {
        if (! Gate::allows('exam-categories-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $cat= ExamCategory::find($id);

        if (!$cat) {
            return response()->json('Exam Category    Not Found');
        }

        if ($cat->delete()) {
            return response()->json("ExamCategory (" . $id . ')  Exam Category  has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }


}
