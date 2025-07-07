<?php

namespace App\Http\Controllers\Dashboard\Settings;


use App\Models\AcademicYear;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Validator;
use View;
use SRS;
class AcademicYearController extends Controller
{
    protected $academic_year_model;
    function __construct()
    {
        $this->academic_year_model=new Repository(new AcademicYear());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('academic_years-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);

        return view('dashboard.settings.academic-years.index', $data);

    }
    public function getJsonAcademicYears(){
        if (! Gate::allows('academic_years-view')) {
            return abort(401);
        }

        $academics = $this->academic_year_model->all();
        return DataTables::of($academics)
            ->editColumn('status',function ($ac){
                if($ac->status==1){
                    return 'Active';
                }else{
                    return 'Inactive';
                }
            })
            ->addColumn('action', function ($academ) {
                if(Gate::allows('academic_years-edit')){
                $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-academic-year-edit-button" data-url="' . route('academic-years.edit', SRS::encode($academ->id)) . '"');
                }
                if(gate::allows('academic_years-delete')){
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Year =>" . $academ->year) . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('academic-years.destroy', SRS::encode($academ->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <a href='#' class='btn po-close btn-primary'>" . trans('app.no') . "</a>\"  rel='popover'><i class=\"fa fa fa-trash-o pl-2 red\"></i> "
                    . "</a>";
                }
                $action = html_entity_decode($edit_link) . html_entity_decode($delete_link);

                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('academic_years-create')) {
            return abort(401);
        }

//        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
//
//        $status['']='';
       $status=[0=>'Inactive',1=>'Active'];

       $data['status']=$status;
//        return view('dashboard.settings.academic-years.create', $data);
        return View::make('dashboard.settings.academic-years.modals.modal_body_create',$data)->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('academic_years-create')) {
            return abort(401);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'year' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        
        $all_ac_years = AcademicYear::all();
        if($input['status']==1){
            foreach($all_ac_years as $ay){
                if($ay->status==1){
                    $ay->update(['status'=>0]);
                }
            }
        }

        $this->academic_year_model->create($input);
        return back()->with('message', 'Academic Year Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('academic_years-edit')) {
            return abort(401);
        }

        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        // $inst_model = new Repository(new Institution());

        $status['']='';
        $status=[0=>'Inactive',1=>'Active'];

        $data['status']=$status;


        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        $data['ac_year'] = AcademicYear::find($id);

        return View::make('dashboard.settings.academic-years.modals.modal_body_edit', $data)->render();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('academic_years-edit')) {
            return abort(401);
        }

        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $ac_year = AcademicYear::find($id);
        if (!$ac_year) {
            return back()->withInput()->with('Academic Year not found');
        }
        $rules = [
            'year' => 'required',
            'status' => 'required',
        ];

        $messages = [
            'year.required' => 'Year Name Required',
            'status' => 'Status required',
        ];
        $this->validate($request, $rules, $messages);
        $input=$request->all();
        // $input['year_id']=Auth::user()->staff->year_id;
        try {
            $all_ac_years = AcademicYear::all();
            if($input['status']==1){
                foreach($all_ac_years as $ay){
                    if($ay->status==1){
                        $ay->update(['status'=>0]);
                    }
                }
            }
            $ac_year->update($input);

            return back()->with('message', 'Academic Year updated successfully');

        } catch (\Exception $ex) {
            return back()->with('A system error occurred');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (! Gate::allows('academic_years-delete')) {
            return abort(401);
        }

        $id = SRS::decode($id)[0];

        $batch = AcademicYear::find($id);
        
        if (!$batch) {
            return response()->json('ACADEMIC YEAR   Not Found');
        }
        
        if($batch->status==1){
            return response()->json('ACTIVE YEAR cannot be deleted!!'); 
        }else{
            if ($batch->delete()) {
                return response()->json("Academic Year  has been Deleted Successfully");
            } else {
                return response()->json('error', 'An unknown system error occurred');
            }
        }
    }
}
