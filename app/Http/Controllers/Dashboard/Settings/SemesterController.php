<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Support\Facades\Gate;
use Validator;
use Yajra\DataTables\DataTables;
use View;
use SRS;

class SemesterController extends Controller
{
    public function index(){
        if (! Gate::allows('semesters-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Semesters']);

        return view('dashboard.settings.semester.index',$data);
    }
    public function getJsonSemesters(){
        if (! Gate::allows('semesters-view')) {
            return abort(401);
        }
        $semesters = Semester::query();

        return DataTables::of($semesters)
        ->addIndexColumn()
        ->addColumn('action',function($s){
            $edit_link="";
            $delete_link="";
            if (Gate::allows('semesters-edit')) {
                $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-semester-edit-button" data-url="' . route('semesters.edit', SRS::encode($s->id)) . '"');
            }
            if (Gate::allows('semesters-delete')) {
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $s->name) . "</b>' data-content=\"<p>"
                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('semesters.destroy', SRS::encode($s->id)) . "'>"
                . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                . "</a>";
            }
           
            $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);
            return $action;
        })->escapeColumns(['action'])
        ->make(true);

    }
    public function create(){
        if (! Gate::allows('semesters-create')) {
            return abort(401);
        }
        return View::make('dashboard.settings.semester.modals.modal_body_create')->render();
    }
    public function edit($id){
        if (! Gate::allows('semesters-edit')) {
            return abort(401);
        }
        try{
           $id = SRS::decode($id)[0];
        }catch(\Exception $e){
           abort('404');
        }
        $semester = Semester::find($id);
        $data['semester'] = $semester;
        return View::make('dashboard.settings.semester.modals.modal_body_edit',$data)->render();

    }
    public function store(Request $request){
        if (! Gate::allows('semesters-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'semester'=>'required',
                'title'=>'required',
                'status'=>'required',
            ]
            );

            if ($validator->fails()) {
                return back()->withInput()->with('errors', $validator->errors());
            }

             if($request->status == 1){
               //checking if there is any active semester
               $activeSemesters = Semester::where('status',1)->get();
               if($activeSemesters->count() > 0){
                   foreach($activeSemesters as $activeSemester){
                  //update all active semesters and make them inactive
                  $activeSemester->update(['status'=>0]);
               }
             } 
           }

            Semester::create($input);
            return back()->with('message', 'Semester Successfully Added');


    }
    public function update(Request $request,$id){
        if (! Gate::allows('semesters-edit')) {
            return abort(401);
        }
        try{
            $id = SRS::decode($id)[0];
         }catch(\Exception $e){
            abort('404');
         }
        $input = $request->all();
        $validator = Validator::make($input, [
            'semester' => 'required',
            'status' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        
        if($request->status == 1){
            //checking if there is any active semester
          $activeSemesters = Semester::where('status',1)->get();
          if($activeSemesters->count() > 0){
            foreach($activeSemesters as $activeSemester){
                //update all active semesters and make them inactive
                $activeSemester->update(['status'=>0]);
            }
          } 
        }

        Semester::find($id)->update([
           'semester'=> $request->semester,
           'title'=> $request->title,
           'status'=> $request->status,
        ]);
        return back()->with('message', 'Semester Successfully Updated');

    }
    public function  destroy($id){
        if (! Gate::allows('semesters-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return response()->json('error', 'Something went wrong!!');
        }
        $semester = Semester::find($id);

        if (!$semester) {
            return response()->json('Semester   Not Found');
        }

        if ($semester->delete()) {
            return response()->json("Semester (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }


    }
}
