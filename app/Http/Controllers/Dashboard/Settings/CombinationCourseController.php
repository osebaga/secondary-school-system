<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Models\Combination;
use App\Models\CombinationCourse;
use App\Models\Course;
use Validator;
use App\Repositories\Common\Repository;

use App\Models\Semester;
use Illuminate\Support\Facades\Gate;


class CombinationCourseController extends Controller
{
    protected $combinationCourseModel;

    function __construct()
    {
        $this->combinationCourseModel = new Repository(new CombinationCourse());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $courses = Course::all();
        $academic_years = AcademicYear::all();
        $semesters = Semester::all();
        $combination = Combination::find($id);
        $combination_courses = CombinationCourse::where('combination_id', $id)->get();
        if (! Gate::allows('institutions-view')) {
            return abort(401);
        }
        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Combination > Courses']);
        
        return view('dashboard.settings.combinations.courses.index', $data, compact('combination', 'courses', 'academic_years', 'semesters', 'combination_courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (! Gate::allows('institutions-create')) {
            return abort(401);
        }

        $combination = Combination::where('id', $id)->first();
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'year_of_study' => 'required',
            'year_id' => 'required',
            'semester' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }

        $this->combinationCourseModel->create([
            'combination_code' => $combination->combination_code,
            'course_id' => $request->course_id,
            'combination_id' => $combination->id,
            'year_id' => $request->year_id,
            'year_of_study' => $request->year_of_study,
            'semester' => $request->semester,
            'programme_id' => $combination->programme_id

        ]);
        return back()->with('message', 'Combination course Successfully Added');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
