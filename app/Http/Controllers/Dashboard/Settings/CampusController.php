<?php

namespace App\Http\Controllers\Dashboard\Settings;
use App\Models\Campus;
use App\Models\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Validator;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class CampusController extends Controller
{

    function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        if (! Gate::allows('campus-view')) {
            return abort(401);
        }

        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Campuses']);

        $data['institutions'] = Institution::with('campuses')->get();
        return view('dashboard.settings.campuses.index', $data);


    }
    public function getJsonCampus(){
        if (! Gate::allows('campus-view')) {
            return abort(401);
        }

        
        $campuses = Campus::with('institution');

        return DataTables::of($campuses)
            ->editColumn('institution_id',function ($c){
                return $c->institution->institution_name.'('.$c->institution->institution_acronym.')';
            })
            ->addColumn('action', function ($c) {
                $edit_link ="";
                $delete_link ="";
                if(Gate::allows('campus-edit')){
                $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-campus-edit-button" data-url="' . route('campus.edit', SRS::encode($c->id)) . '"');
                }
                
                if(Gate::allows('campus-delete')){
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $c->campus_name) . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('campus.destroy', SRS::encode($c->id)) . "'>"
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
        if (! Gate::allows('campus-create')) {
            return abort(401);
        }
         $insts=Institution::all();
         $institutions['']='';
         foreach ($insts as $inst){
             $institutions[$inst->id]=$inst->institution_name;
         }

        $data['institutions']=$institutions;

        return View::make('dashboard.settings.campuses.modals.modal_body_create',$data)->render();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('campus-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'institution_id' => 'required',
            'campus_name' => 'required',
            'campus_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        Campus::create($input);
        return back()->with('message', 'Campus Successfully Added');

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
        if (! Gate::allows('campus-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }


        $insts = Institution::all();
        $institutions['']='';
        foreach ($insts as $institution) {

        $institutions[$institution->id] = $institution->institution_name;
       }
        $data['institutions']=$institutions;
        $campus = Campus::find($id);
        $data['campus'] = $campus;

        return View::make('dashboard.settings.campuses.modals.modal_body_edit', $data)->render();



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
        if (! Gate::allows('campus-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'institution_id' => 'required',
            'campus_name' => 'required',
            'campus_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $data=[
            'institution_id' => $input['institution_id'],
            'campus_name' => $input['campus_name'],
            'campus_acronym' =>$input['campus_acronym'],
        ];
        Campus::where('id',$id)->update($data);
        return back()->with('message', 'Campus Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('campus-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $inst = Campus::find($id);

        if (!$inst) {
            return response()->json('Campus   Not Found');
        }

        if ($inst->delete()) {
            return response()->json("Campus (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }
}
