<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Lib\SRS;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Gpa;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;

class GpaController extends Controller
{
    protected $gpa_model, $college_model, $srs;

    function __construct()
    {
        $this->gpa_model = new Repository(new Gpa());
        $this->college_model = new Repository(new College());
        $this->srs = new SRS();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($faculty_id)
    {
        if (! Gate::allows('gpa-settings-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Colleges&Schools Setting']);

        try {
            $id = $this->srs->decode($faculty_id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $faculty = Faculty::find($id)->with('college')->first();
        $data['faculty'] = $faculty;
        $data['id'] = $this->srs->encode($faculty->college->id);
        return view('dashboard.settings.gpa-settings.index_gpa_settings', $data);

    }

    public function Schools()
    {
        if (! Gate::allows('gpa-settings-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Colleges&Schools']);
        $colleges = $this->college_model->with(['faculties'])->get();
        //dd($colleges);
        $data['colleges'] = $colleges;
        $data['srs'] = $this->srs;
        return view('dashboard.settings.gpa-settings.index_schools', $data);

    }

    public function getJsonGPA($school)
    {
        if (! Gate::allows('gpa-settings-view')) {
            return abort(401);
        }
        try {
            $college_id = $this->srs->decode($school)[0];
        } catch (\Exception $ex) {
            abort(404);
        }
        $gpa = Gpa::academicYear()
            ->where('college_id', '=', $college_id)
            ->get();
        // dd($gpa);
        return DataTables::of($gpa)
            ->addIndexColumn()
            ->editColumn('sup_gpa', function ($g) {
                return $g->sup_gpa;
            })
            ->editColumn('continue_gpa', function ($g) {
                return $g->continue_gpa;
            })
            ->addColumn('action', function ($g) {
                $edit_link = link_to(route('grade-schemes.edit', $this->srs->encode($g->id)), '<i class="fa fa-edit p-2"></i>', 'id="scheme-edit" data-id="' . $this->srs->encode($g->id) . '"');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Scheme") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('grade-schemes.destroy', $this->srs->encode($g->id)) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-2\"></i> "
                    . "</a>";
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
        if (! Gate::allows('gpa-settings-create')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Create Grade Scheme']);

        return view('dashboard.settings.grade-schemes.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('gpa-settings-create')) {
            return abort(401);
        }
        $input = $request->all();
        try{
            $college_id=$this->srs->decode($input['college_id'])[0];
        }catch (\Exception $e){
            abort(404);
        }
        $validator = Validator::make($input, [
            'college_id' => 'required',
            'sup_gpa' => 'required|numeric',
            'continue_gpa' => 'required|numeric',
        ]);
        //dd($input);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        $input['year_id'] = Auth::user()->staff->year_id;
        $input['college_id']=$college_id;

        //dd($input);
        // $inst_model = new Repository(new Institution());
        $this->gpa_model->create($input);
        return back()->with('message', 'GPA Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gpa-settings-edit')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        try {
            $id = $this->srs->decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $data['grade_scheme'] = $this->grade_scheme_model->find($id);
        $data['srs'] = $this->srs;
        return View::make('dashboard.settings.grade-schemes.modals.modal_body', $data)->render();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('gpa-settings-edit')) {
            return abort(401);
        }
        $input = $request->all();
        //dd($input);
        $validator = Validator::make($input, [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        $id = $this->srs->decode($id)[0];
        $this->grade_scheme_model->update($input, $id);
        return back()->with('message', 'GPA  Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gpa-settings-delete')) {
            return abort(401);
        }
        $id = $this->srs->decode($id)[0];
        $this->grade_scheme_model->destroy($id);
        return back()->with('messsage', 'Grade Scheme deleted Successfully');
    }
}
