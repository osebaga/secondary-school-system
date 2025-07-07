<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Models\StudyLevel;
use App\Repositories\Common\Repository;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Models\Grade;
use Illuminate\Support\Facades\Gate;
use View;
use Validator;
use SRS;


class GradeController extends Controller
{

    function __construct()
    {


    }
    public function index($study_level_id){
        if (! Gate::allows('grades-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'Study Level']);
        try{
            $id=SRS::decode($study_level_id)[0];
        }catch (\Exception $e){

         abort(404);
        }

        $data['study_level']=StudyLevel::find($id);
        $data['id']=$study_level_id;
        return view('dashboard.settings.grades.index', $data);

    }
    public function getJsonGrades($study_level_id){
        if (! Gate::allows('grades-view')) {
            return abort(401);
        }
        try{
            $id=SRS::decode($study_level_id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $where=[
            'study_level_id'=>$id
            // 'year_id'=>Auth::user()->staff->year_id,
        ];
        $grade = Grade::where($where)->orderBy('grade_point','DESC')->get();
        return DataTables::of($grade)
            ->addIndexColumn()
            ->addColumn('eqn',function ($g){
                return '<b>GP='.$g->left_value.'RM'.' '.$g->operator.' '.$g->right_value.'</b>';
            })
            ->addColumn('action', function ($g) {
                $edit_link = link_to(route('grades.edit',SRS::encode($g->id)), '<i class="fa fa-edit p-2"></i>', 'id="grade-edit" data-id="'.SRS::encode($g->id).'"');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Grade") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('grades.destroy',SRS::encode($g->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i> "
                    ."</a>";
                $action =html_entity_decode($edit_link).html_entity_decode($delete_link);

                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    public function store(Request $request){
        if (! Gate::allows('grades-create')) {
            return abort(401);
        }
        $input = $request->all();
        try {
            $study_level_id=SRS::decode($input['study_level_id'])[0];

        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Please Check the value of your inputs! '.'code='.$e->getCode());

        }
        $input['study_level_id']=$study_level_id;
        $input['year_id']=Auth::user()->staff->year_id;

        $validator = Validator::make($input, [
           // 'grade' => 'required|unique:grades,grade,null,id,scheme_id,'.$scheme_id,
            //'scheme_id' => 'required|unique:grades,scheme_id,null,id,grade,'.$input['grade'],
            'grade' => 'required',
            'study_level_id' => 'required',
            'high_value' => 'required',
            'low_value' => 'required',
            'grade_point' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
       try {

           Grade::create($input);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Please Check the value of your inputs! '.'code='.$e->getMessage());

        }

        return back()->with('message', 'Grade Successfully Added');

    }
    public function edit($id){
        if (! Gate::allows('grades-edit')) {
            return abort(401);
        }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $grade=Grade::find($id);
        $data['grade']=$grade;;
        $view= View::make('dashboard.settings.grades.modals.modal_body',$data);

        return $view->render();
    }
    public  function update(Request $request,$id){
        if (! Gate::allows('grades-create')) {
            return abort(401);
        }
    $input=$request->all();

    try{
        $id=SRS::decode($id)[0];
        $study_level_id=SRS::decode($input['study_level_id'])[0];
    }catch (\Exception $e){

        abort(404);
    }


    $input['study_level_id']=$study_level_id;
    $input['year_id']=Auth::user()->staff->year_id;
    $validator = Validator::make($input, [
        'grade' => 'required',
        'study_level_id' => 'required',
        'high_value' => 'required',
        'low_value' => 'required',
        'grade_point' => 'required',

    ]);

    if ($validator->fails()) {
        return back()->withInput()->with('errors', $validator->errors());
    }
    try{
        Grade::find($id)->update($input);
    }catch (\Exception $e){
        return back()->withInput()->with('error', 'Something went wrong! Duplicated Values! (code='.$e->getCode().')');

    }
    return back()->with('message', 'Grade Successfully Changed');



}
    public function destroy($id)
    {
        if (! Gate::allows('grades-delete')) {
            return abort(401);
        }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        Grade::find($id)->delete();
        return back()->with('messsage','Grade deleted Successfully');
    }
}
