<?php

namespace App\Http\Controllers\Dashboard\Settings;


use App\Models\Position;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use View;
// use Validator;
use SRS;

class PositionController extends Controller
{
    protected $position_model,$srs;
    function __construct()
    {
    }
    public function index(){
        // if (! Gate::allows('positions-view')) {
        //     return abort(401);
        // }
        $data['bc'] = array(['link'=>route('dashboard'),'page'=>'Dashboard'],['link' => '#', 'page' => 'Staff Positions']);

        

        return view('dashboard.settings.positions.index', $data);

    }
    public function getJsonPositions(){
        // if (! Gate::allows('positions-view')) {
        //     return abort(401);
        // }

        $pos = Position::all();
        return DataTables::of($pos)
            ->addIndexColumn()
            ->addColumn('action', function ($p) {
                $edit_link = "";
                $delete_link = "";
                if (Gate::allows('positions-edit')) {
                    $edit_link = link_to(route('positions.edit',SRS::encode($p->id)), '<i class="fa fa-edit p-2"></i>', 'id="position-edit" data-id="'.SRS::encode($p->id).'"');
                }
                if (Gate::allows('positions-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Position") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" .route('positions.destroy',SRS::encode($p->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i> "
                    ."</a>";
                                }
           
                $action =html_entity_decode($edit_link).html_entity_decode($delete_link);

                return $action;
            })->escapeColumns('action')
            ->make(true);
    }

    public function store(Request $request){
        // if (! Gate::allows('positions-create')) {
        //     return abort(401);
        // }
        $input=$request->all();
        $validator = Validator::make($input, [
            'position_name' => 'required',


        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try {

            Position::create($input);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Something went wrong try again! '.'code='.$e->getMessage());

        }

        return back()->with('message', 'Position Successfully Added');

    }
    public function edit($id){
        // if (! Gate::allows('positions-edit')) {
        //     return abort(401);
        // }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
        $position=Position::find($id);
        $data['position']=$position;

        $view= View::make('dashboard.settings.positions.modals.modal_body',$data);

        return $view->render();
    }
    public  function update(Request $request,$id){
        // if (! Gate::allows('positions-edit')) {
        //     return abort(401);
        // }
        $input=$request->all();
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }


        $validator = Validator::make($input, [

            'position_name' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        try{
                     $data=[
                        'position_name'=>$input['position_name']
                     ];
            Position::where('id',$id)->update($data);
        }catch (\Exception $e){
            return back()->withInput()->with('error', 'Something went wrong! (code='.$e->getMessage().')');

        }
        return back()->with('message', 'Position Successfully Changed');



    }
    public function destroy($id)
    {
        // if (! Gate::allows('positions-delete')) {
        //     return abort(401);
        // }
        try{
            $id=SRS::decode($id)[0];
        }catch (\Exception $e){

            abort(404);
        }
       Position::find($id)->delete();
        return  response()->json('Position deleted Successfully');
        //return back()->with('message','Position deleted Successfully');
    }
}
