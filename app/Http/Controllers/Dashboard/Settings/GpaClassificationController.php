<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;

use App\Models\GpaClassification;
use App\Models\Grade;
use App\Models\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;
use View;
use SRS;

class GpaClassificationController extends Controller
{
    function __construct()
    {


    }
    public function index($study_level_id){
        if (! Gate::allows('gpa_classifications-view')) {
            return back()->with('warning',trans('app.access_denied'));
        }
        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'GPA Classifications']);
        try{
            $id=SRS::decode($study_level_id)[0];
        }catch (\Exception $e){

            abort(404);
        }

        $data['study_level']=StudyLevel::find($id);
        $data['id']=$study_level_id;
        return view('dashboard.settings.gpa-classifications.index', $data);

    }
    public function getJsonGpaClassifications($study_level_id){
        if (! Gate::allows('gpa_classifications-view')) {
            return back()->with('warning',trans('app.access_denied'));
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

        $gpa_class = GpaClassification::where($where)->orderBy('class_award','DESC')->get();
        return DataTables::of($gpa_class)
            ->addIndexColumn()
            ->addColumn('class_award',function ($g){
                return $g->class_award;
            })
            ->addColumn('action', function ($g) {
                $edit_link = link_to(route('gpa-classifications.edit',SRS::encode($g->id)), '<i class="fa fa-edit p-2"></i>', 'id="gpa-class-edit" data-id="'.SRS::encode($g->id).'"');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Class Award") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('gpa-classifications.destroy',SRS::encode($g->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i> "
                    ."</a>";
                $action =html_entity_decode($edit_link).html_entity_decode($delete_link);

                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    public function store(Request $request){
        if (! Gate::allows('gpa_classifications-create')) {
            return back()->with('warning',trans('app.access_denied'));
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
            'class_award' => 'required',
            'study_level_id' => 'required',
            'high_gpa' => 'required',
            'low_gpa' => 'required',
            'year_id' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try {

            GpaClassification::create($input);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Please Check the value of your inputs! '.'code='.$e->getMessage());

        }

        return back()->with('message', 'Class Award Successfully Added');

    }
    public function edit($id){
        if (! Gate::allows('gpa_classifications-edit')) {
            return back()->with('warning',trans('app.access_denied'));
        }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $gpa_class=GpaClassification::find($id);
        $data['gpa_classification']=$gpa_class;
        $view= View::make('dashboard.settings.gpa-classifications.modals.modal_body',$data);

        return $view->render();
    }
    public  function update(Request $request,$id){
        if (! Gate::allows('gpa_classifications-edit')) {
            return back()->with('warning',trans('app.access_denied'));
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
            'class_award' => 'required',
            'study_level_id' => 'required',
            'high_gpa' => 'required',
            'low_gpa' => 'required',
            'year_id' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try{
            GpaClassification::find($id)->update($input);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Something went wrong! Duplicated Values! (code='.$e->getCode().')');

        }
        return back()->with('message', 'Class Award Successfully Changed');



    }
    public function destroy($id)
    {
        if (! Gate::allows('gpa_classifications-delete')) {
            return back()->with('warning',trans('app.access_denied'));
        }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        StudyLevel::destroy($id);
        return response()->json('Class Award deleted Successfully');
    }
}
