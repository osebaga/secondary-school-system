<?php

namespace App\Http\Controllers\Dashboard\Settings;
;
use App\Models\Grade;
use App\Models\GradeScheme;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;
use Validator;
use View;
use SRS;

class GradeSchemeController extends Controller
{
    protected $grade_scheme_model;

    function __construct()
    {
        $this->grade_scheme_model = new Repository(new GradeScheme());

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('grade-schemes-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Grade Scheme']);
        return view('dashboard.settings.grade-schemes.index', $data);
    }

    public function shift_grade_scheme()
    {
        if (! Gate::allows('grade-schemes-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Shift Grade Scheme']);
        $grade_scheme_only = DB::table('grade_schemes')
            ->join('grades', 'grades.scheme_id', '=', 'grade_schemes.id')
            ->join('academic_years', 'grades.year_id', '=', 'academic_years.id')
            ->where('grades.year_id', '=', Auth::user()->staff->year_id)
            ->groupBy('scheme_id')
            ->get();
        $data['grade_scheme_only'] = $grade_scheme_only;
        return view('dashboard.settings.grade-schemes.shift_grade_scheme', $data);
    }

    public  function unshift_grade_scheme($scheme_id){
        if (! Gate::allows('grade-schemes-view')) {
            return abort(401);
        }
        $where = [
            'scheme_id' => SRS::decode($scheme_id)[0],
            'year_id' => Auth::user()->staff->year_id + 1,
        ];
        try {

            Grade::where($where)->delete();
            return back()->with('message', 'Grade Scheme deleted Successfully');
            }catch (\Exception $e){
            return back()->with('error', 'Something went wrong');
        }






    }

    public function shift_grade_scheme_by_name($scheme_id)
    {
        if (! Gate::allows('grade-schemes-view')) {
            return abort(401);
        }
        $scheme_id = SRS::decode($scheme_id)[0];
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Shift Grade Scheme']);
        $grade= DB::table('grade_schemes')
            ->join('grades', 'grades.scheme_id', '=', 'grade_schemes.id')
            ->join('academic_years', 'grades.year_id', '=', 'academic_years.id')
            ->where('grades.year_id', '=', Auth::user()->staff->year_id)
            ->where(function ($query) use ($scheme_id) {
                $query->where('grades.scheme_id', '=', $scheme_id);
            })
            ->get();
        $grade_scheme=DB::table('grade_schemes')
            ->where('id','=',$scheme_id)
            ->get();
        try {
            DB::beginTransaction();
            $scheme_db="";
            foreach ($grade_scheme as $schemes){
                $grade_scheme_data = [
                    'name' => $schemes->name
                ];
                //$scheme_db = GradeScheme::create($grade_scheme_data);
            }
            foreach ($grade as $grades) {
                $grade_data = [
                    'scheme_id' => $grades->scheme_id,
                    'year_id' => Auth::user()->staff->year_id + 1,
                    'grade' => $grades->grade,
                    'high_value' => $grades->high_value,
                    'low_value' => $grades->low_value,
                    'grade_point' => $grades->grade_point,
                    'left_value' => $grades->left_value,
                    'operator' => $grades->operator,
                    'right_value' => $grades->right_value,
                    'point_decimal_place' => $grades->point_decimal_place
                ];
                $where = [
                    'scheme_id' => $grades->scheme_id,
                    'year_id' => Auth::user()->staff->year_id + 1,
                ];
                $grade_db = Grade::create($grade_data);
                DB::commit();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }
        return redirect()->back()->with('message', 'Grade Scheme Shifted Successfully !!!');
    }

    public function getJsonGradeSchemes()
    {
        if (! Gate::allows('grade-schemes-view')) {
            return abort(401);
        }
        $scheme = $this->grade_scheme_model->all();
        return DataTables::of($scheme)
            ->addIndexColumn()
            ->editColumn('name', function ($g) {
                return link_to(route('grades.index', SRS::encode($g->id)), $g->name);
            })
            ->addColumn('gpa_classification',function ($g){
                return link_to(route('gpa-classifications.index', SRS::encode($g->id)),'Set GPA Classification ['. $g->name.']');

            })
            ->addColumn('action', function ($g) {
                $edit_link = link_to(route('grade-schemes.edit', SRS::encode($g->id)), '<i class="fa fa-edit p-2"></i>', 'id="scheme-edit" data-id="' . SRS::encode($g->id) . '"');
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Scheme") . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('grade-schemes.destroy', SRS::encode($g->id)) . "'>"
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
        if (! Gate::allows('grade-schemes-create')) {
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
        if (! Gate::allows('grade-schemes-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
        // $inst_model = new Repository(new Institution());
        $this->grade_scheme_model->create($input);
        return back()->with('message', 'Grade Scheme Successfully Added');

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
        if (! Gate::allows('grade-schemes-edit')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => '#', 'page' => 'Dashboard'],);
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

        $data['grade_scheme'] = $this->grade_scheme_model->find($id);
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
        if (! Gate::allows('grade-schemes-edit')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }
       // $id = SRS::decode($id)[0];
        $this->grade_scheme_model->update($input, $id);
        return back()->with('message', 'Grade Scheme Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('grade-schemes-delete')) {
            return abort(401);
        }
        $id = SRS::decode($id)[0];
        $this->grade_scheme_model->destroy($id);
        return back()->with('message', 'Grade Scheme deleted Successfully');
    }
}
