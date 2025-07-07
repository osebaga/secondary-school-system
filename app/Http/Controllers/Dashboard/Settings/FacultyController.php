<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Helpers\SRS as HelpersSRS;
use App\Models\Campus;
use App\Models\Faculty;
use App\Models\Institution;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Validator;
use Yajra\DataTables\DataTables;
use View;
use SRS;

class FacultyController extends Controller
{
    protected  $srs;

    function __construct()
    {
      $this->srs = new HelpersSRS();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('faculties-view')) {
            return abort(401);
        }
         $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Faculties']);
        $data['srs']= $this->srs;
        $data['campuses'] = Campus::with('faculties')->get();
        // $data['campuses'] = Campus::all();
        // dd($data['institutions']);
        // exit;
        return view('dashboard.settings.faculties.index', $data);

    }
    public function getJsonFaculties(){
        if (! Gate::allows('faculties-view')) {
            return abort(401);
        }
        $faculties = Faculty::with('campus');
        return DataTables::of($faculties)
            ->editColumn('campus_id',function ($fac){

                return $fac->campus->campus_name.'('.$fac->campus->campus_acronym.')';
            })
            ->addColumn('action', function ($f) {
                $edit_link = "";
                $delete_link = "";
                if (Gate::allows('faculties-edit')) {
                    $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-faculty-edit-button" data-url="' . route('faculties.edit', $this->srs->encode($f->id)) . '"');
                }
                if (Gate::allows('faculties-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $f->faculty_name) . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('faculties.destroy', $this->srs->encode($f->id)) . "'>"
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
        if (! Gate::allows('faculties-create')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        $insts=Institution::all();
        $institutions['']='';
        foreach ($insts as $inst){
            $institutions[$inst->id]=$inst->institution_name;
        }

        $camps=Campus::all();
        $campuses['']='';
        foreach ($camps as $camp){
            $campuses[$camp->id]=$camp->campus_name;
        }

        $data['institutions']=$institutions;
        $data['campuses']=$campuses;
        return View::make('dashboard.settings.faculties.modals.modal_body_create',$data)->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('faculties-create')) {
            return abort(401);
        }
        $input = $request->except(['institution_id']);
        $validator = Validator::make($request->all(), [
            'institution_id' => 'required',
            'campus_id'=>'required',
            'faculty_name' => 'required',
            'faculty_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        Faculty::create($input);
        return back()->with('message', 'Faculty Successfully Added');

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
        if (! Gate::allows('faculties-edit')) {
            return abort(401);
        }

        try {
            $id = $this->srs->decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }

        $data['faculty'] = Faculty::find($id);
        $insts = Institution::all();
        $camps = Campus::all();
        $institutions['']='';
        foreach ($insts as $institution) {

            $institutions[$institution->id] = $institution->institution_name;
        }
        $campuses['']='';
        foreach ($camps as $campus) {

            $campuses[$campus->id] = $campus->campus_name;
        }
        $data['institutions']=$institutions;
        $data['campuses']=$campuses;
        $data['srs'] = $this->srs;
        return View::make('dashboard.settings.faculties.modals.modal_body_edit', $data)->render();


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
        if (! Gate::allows('faculties-edit')) {
            return abort(401);
        }
        //dd($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'institution_id' => 'required',
            'campus_id' => 'required',
            'faculty_name' => 'required',
            'faculty_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $data=[
            'institution_id' => $input['institution_id'],
            'faculty_name' => $input['faculty_name'],
            'faculty_acronym' => $input['faculty_acronym'],
        ];
        Faculty::where('id',$id)->update($data);
        return back()->with('message', 'Faculty Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('faculties-delete')) {
            return abort(401);
        }
        try {
            $id = $this->srs->decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $inst = Faculty::find($id);

        if (!$inst) {
            return response()->json('Faculty Not Found');
        }

        if ($inst->delete()) {
            return response()->json("Faculty (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }
}
