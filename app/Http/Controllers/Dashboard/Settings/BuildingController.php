<?php

namespace App\Http\Controllers\Dashboard\Settings;


use App\Models\Building;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use View;
use Validator;
use Yajra\DataTables\DataTables;
use SRS;
class BuildingController extends Controller
{
    protected $building_model,$srs;
    function __construct()
    {
        $this->building_model=new Repository(new Building());

    }
    public function index(){
        if (! Gate::allows('buildings-view')) {
            return abort(401);
        }

        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'Staff Offices']);


        return view('dashboard.settings.buildings.index', $data);

    }
    public function getJsonBuildings(){
        if (! Gate::allows('buildings-view')) {
            return abort(401);
        }


        $buildings = $this->building_model->all();
        return DataTables::of($buildings)
            ->addIndexColumn()
            ->addColumn('action', function ($b) {
                $edit_link="";
                $delete_link="";
                if (Gate::allows('buildings-edit')) {
                    $edit_link = link_to(route('buildings.edit',SRS::encode($b->id)), '<i class="fa fa-edit p-2"></i>', 'id="building-edit" data-id="'.SRS::encode($b->id).'"');

                }
                if (Gate::allows('buildings-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Building") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('buildings.destroy',SRS::encode($b->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i> "
                    ."</a>";
                }
               
                $action =html_entity_decode($edit_link).html_entity_decode($delete_link);

                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    public function store(Request $request){
        if (! Gate::allows('buildings-create')) {
            return abort(401);
        }

        
        $input=$request->all();
        $validator = Validator::make($input, [
            'building_name' => 'required',
            'location' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try {

            $this->building_model->create($input);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Something went wrong try again! '.'code='.$e->getMessage());

        }

        return back()->with('message', 'Building Successfully Added');

    }
    public function edit($id){
        if (! Gate::allows('buildings-edit')) {
            return abort(401);
        }

        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $building=$this->building_model->find($id);
        $data['building']=$building;
        $view= View::make('dashboard.settings.buildings.modals.modal_body',$data);

        return $view->render();
    }
    public  function update(Request $request,$id){
        if (! Gate::allows('buildings-edit')) {
            return abort(401);
        }

        $input=$request->all();
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }


        $validator = Validator::make($input, [
            'building_name' => 'required',
            'location' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try{
            $this->building_model->update($input,$id);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Something went wrong! (code='.$e->getMessage().')');

        }
        return back()->with('message', 'Building Successfully Changed');



    }
    public function destroy($id)
    {
        if (! Gate::allows('buildings-delete')) {
            return abort(401);
        }

        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $this->building_model->destroy($id);
        return  response()->json('Building deleted Successfully');
        //return back()->with('message','Position deleted Successfully');
    }
}
