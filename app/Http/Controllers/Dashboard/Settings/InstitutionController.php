<?php

namespace App\Http\Controllers\Dashboard\Settings;


use App\Models\Institution;
use App\Repositories\Common\Repository;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Validator;
use Yajra\DataTables\DataTables;
use View;
use SRS;
class InstitutionController extends Controller
{
    protected $inst_model;

    function __construct()
    {
        $this->inst_model = new Repository(new Institution());


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('institutions-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Institutions']);


        return view('dashboard.settings.institutions.index', $data);

    }

    public function getJsonInstitutions()
    {
        if (! Gate::allows('institutions-view')) {
            return abort(401);
        }
        //$inst_model = new Repository(new Institution());
        $insts = $this->inst_model->all();
        return DataTables::of($insts)
            ->addColumn('action', function ($i) {
                $edit_link ="";
                $delete_link ="";
               if(Gate::allows('institutions-edit')){
                   $edit_link = link_to("#", '<i class="fa fa fa-edit pl-2"></i>', 'class="sledit" id="resource-institution-edit-button" data-url="' . route('institutions.edit', SRS::encode($i->id)) . '"');
               }
                if(Gate::allows('institutions-delete')) {
                    $delete_link = "<a href='#' class='po' title='<b>" . ("Delete  =>" . $i->institution_name) . "</b>' data-content=\"<p>"
                        . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('institutions.destroy', SRS::encode($i->id)) . "'>"
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

        if (! Gate::allows('institutions-create')) {
            return abort(401);
        }

        return View::make('dashboard.settings.institutions.modals.modal_body_create')->render();



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('institutions-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'institution_name' => 'required',
            'institution_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
       // $inst_model = new Repository(new Institution());
       // dd($input);
        $this->inst_model->create($input);
        return back()->with('message', 'Institute Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('institutions-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $inst = Institution::find($id);
        $data['inst'] = $inst;

        return View::make('dashboard.settings.institutions.modals.modal_body_edit', $data)->render();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('institutions-edit')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'institution_name' => 'required',
            'institution_acronym' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }

        $this->inst_model->update($input,$id);
        return back()->with('message', 'Institute Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('institutions-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!!');
        }
        $inst = Institution::find($id);

        if (!$inst) {
            return response()->json('Institution   Not Found');
        }

        if ($inst->delete()) {
            return response()->json("Institution (" . $id . ')   has been Deleted Successfully');
        } else {
            return response()->json('error', 'An unknown system error occurred');

        }
    }
}
