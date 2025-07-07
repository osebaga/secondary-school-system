<?php

namespace App\Http\Controllers\Dashboard\Administrations;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\IntakeCategory;
use App\Models\UploadLimit;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\Semester;
use App\Models\Program;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Auth;
use SRS;
use Redirect;
use Illuminate\Support\Facades\Validator;
// use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdministrationController extends Controller {
    public function courseAllocationStudents() {

    }

    public function campus( $view ) {
        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Administration > Student Register' ] );

        $inst = Institution::with( 'campuses' )->get();

        $data[ 'institution' ] = $inst;
        $data[ 'view' ] = $view;

        return view( 'dashboard.administrations.campus', $data );

    }

    public function intakeCategory( $view, $campus_id ) {
        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => url()->previous(), 'page' => 'Administration / Student Register' ], [ 'link' =>'#', 'page' => 'Campuses' ] );
        $intakes = IntakeCategory::all();
        $data[ 'intakes' ] = $intakes;

        $data[ 'view' ] = $view;
        //  dd( $data[ 'intakes' ] );
        $data[ 'campus_id' ] = $campus_id;
        return view( 'dashboard.administrations.intakes', $data );

    }

    public function limitUpload( $campus_id, $intake_id ) {
        try {
            $c_id = SRS::decode( $campus_id )[ 0 ];
            $cat_id = SRS::decode( $intake_id )[ 0 ];
        } catch ( \Exception $e ) {
            abort( 404 );
        }

        $year_id = Auth::user()->staff->year_id;
        $sem1_upload = SRS::checkUploadStatus( $c_id, $cat_id, 1, 1, $year_id );
        $sem2_upload = SRS::checkUploadStatus( $c_id, $cat_id, 2, 1, $year_id );

        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Limit Uploads' ] );
        $data[ 'campus' ] = Campus::find( $c_id );
        $data[ 'intake' ] = IntakeCategory::find( $cat_id );
        $data[ 'sem1_upload' ] = $sem1_upload;
        $data[ 'sem2_upload' ] = $sem2_upload;
        $data[ 'campus_id' ] = $campus_id;
        $data[ 'intake_id' ] = $intake_id;
        //$data
        return view( 'dashboard.administrations.limit_upload', $data );
    }

    public function openUploadSemOne( Request $request ) {
        $year_id = Auth::user()->staff->year_id;
        SRS::toggleUploadStatus( $request, 1, $year_id, 1 );
        return back()->with( 'message', 'Success! Upload has been opened successfully' );

    }

    public function closeUploadSemOne( Request $request ) {
        $year_id = Auth::user()->staff->year_id;
        SRS::toggleUploadStatus( $request, 1, $year_id, 0 );
        return back()->with( 'message', 'Success! Upload has been closed successfully' );

    }

    public function openUploadSemTwo( Request $request ) {
        $year_id = Auth::user()->staff->year_id;
        SRS::toggleUploadStatus( $request, 2, $year_id, 1 );
        return back()->with( 'message', 'Success! Upload has been opened successfully' );
    }

    public function closeUploadSemTwo( Request $request ) {
        $year_id = Auth::user()->staff->year_id;
        SRS::toggleUploadStatus( $request,  2, $year_id, 0 );
        return back()->with( 'message', 'Success! Upload has been closed successfully' );
    }

    public function publishExam( $campus_id, $intake_id ) {
        try {
            $campus_id = SRS::decode( $campus_id )[ 0 ];
            $intake_id = SRS::decode( $intake_id )[ 0 ];
        } catch ( \Exception $e ) {
            abort( 404 );
        }
        $year_id = Auth::user()->staff->year_id;
        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Program&Faculty' ] );

        $module_programs  = Faculty::with( [ 'programs'=>function( $q ) {
            // $q->where( 'year_id', '=', Auth::user()->staff->year_id );
        }
    ] )->get();

    $data[ 'module_programs' ] = $module_programs;
    $data[ 'campus' ] = Campus::find( $campus_id );
    $data[ 'intake' ] = IntakeCategory::find( $intake_id );
    $data[ 'year_id' ] = $year_id;
    $data[ 'campus_id' ] = $campus_id;
    $data[ 'intake_id' ] = $intake_id;
    //$data

    return view( 'dashboard.administrations.publish_exams', $data );
}

public function publishExamSemOne( Request $request ) {
    $year_id = Auth::user()->staff->year_id;
    SRS::togglePublishExamStatus( $request, 1, $year_id, 1 );
    return back()->with( 'message', 'Success! Exam has been published successfully' );

}

public function unPublishExamSemOne( Request $request ) {
    $year_id = Auth::user()->staff->year_id;
    SRS::togglePublishExamStatus( $request, 1, $year_id, 0 );
    return back()->with( 'message', 'Success! Exam  has been un-published successfully' );

}

public function publishExamSemTwo( Request $request ) {
    $year_id = Auth::user()->staff->year_id;
    SRS::togglePublishExamStatus( $request, 2, $year_id, 1 );
    return back()->with( 'message', 'Success! Exam  has been published successfully' );

}

public function unPublishExamSemTwo( Request $request ) {
    $year_id = Auth::user()->staff->year_id;
    SRS::togglePublishExamStatus( $request, 2, $year_id, 0 );
    return back()->with( 'message', 'Success! Exam  has been un-published successfully' );

}

public function limitCourseRegistration( $campus_id, $intake_id ) {
    try {
        $campus_id = SRS::decode( $campus_id )[ 0 ];
        $intake_id = SRS::decode( $intake_id )[ 0 ];
    } catch ( \Exception $e ) {
        abort( 404 );
    }

    $year_id = Auth::user()->staff->year_id;
    $sem1_course_reg = SRS::checkCourseRegistrationStatus( $campus_id, $intake_id, 1, 1, $year_id );
    $sem2_course_reg = SRS::checkCourseRegistrationStatus( $campus_id, $intake_id, 2, 1, $year_id );

    $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Limit Uploads' ] );
    $data[ 'campus' ] = Campus::find( $campus_id );
    $data[ 'intake' ] = IntakeCategory::find( $intake_id );
    $data[ 'sem1_course_reg' ] = $sem1_course_reg;
    $data[ 'sem2_course_reg' ] = $sem2_course_reg;
    $data[ 'campus_id' ] = $campus_id;
    $data[ 'intake_id' ] = $intake_id;
    // return( $data );
    return view( 'dashboard.administrations.limit_course_registration', $data );
}

public function openCourseRegistration( Request $request, $semester ) {
    // dd( $request->all() );
    $year_id = Auth::user()->staff->year_id;
    \App\Helpers\SRS::toggleCourseRegistrationStatus( $request, $semester, $year_id, 1 );
    return back()->with( 'message', 'Success! Course Registration has been opened successfully' );

}

public function closeCourseRegistration( Request $request, $semester ) {
    $year_id = Auth::user()->staff->year_id;
    // dd( $semester );
    SRS::toggleCourseRegistrationStatus( $request, $semester, $year_id, 0 );
    return back()->with( 'message', 'Success! Course Registration has been closed successfully' );

}

public function updateClassList() {

    $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Update Class Lists' ] );
    $data[ 'campus' ] = Campus::all();
    $data[ 'programs' ] = Program::all();
    $data[ 'years' ] = AcademicYear::all();
    $data[ 'intakes' ] = IntakeCategory::all();
    $data[ 'year_of_study' ] = StudentClass::all();
    return view( 'dashboard.administrations.update_class_list', $data );
}

public function getclasslist( Request $request ) {
    $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Update Class Lists' ] );

    $validator = Validator::make( $request->all(), [
        'program_id' => 'required',
        'year_id' => 'required',
        'intake_category_id' => 'required',
        // 'year_of_study' => 'required',
        'campus_id'=>'required',
    ] );
    if ( $validator->fails() ) {
        return  back()->with( 'errors', $validator->errors() );

        //dd( 'Form submitted successfully.' );
    }

    $school_id = $request->campus_id;
    $program_id = $request->program_id;
    $year_id = $request->year_id;
    $class_group_id = $request->intake_category_id;
    // $year_of_study = $request->year_of_study;

    $students = StudentClass::join( 'students',
    'student_classes.reg_no', '=', 'students.reg_no' )->
    join( 'users', 'student_classes.reg_no', '=', 'users.username' )->where( [
        [ 'students.campus_id', '=', $school_id],
        [ 'student_classes.year_id', '=', $year_id],
        [ 'student_classes.program_id', '=', $program_id],
        [ 'student_classes.intake_category_id', '=', $class_group_id],
        // [ 'student_classes.year_of_study', '=', $year_of_study ],

    ])->get();
    //  dd( $students );

    // return Redirect::route( 'update.class.lists' )->with( [ 'data' => $data ] );
    return redirect()->back()->with( 'students', $students )->withInput( $request->all() );

}

public function RegNewClassList( Request $request ) {
    $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Update Class Lists' ] );
    $validator = Validator::make( $request->all(), [
        'class_group' => 'required',
        'year_id' => 'required',
        'id' => 'required',
    ] );

    $year_id = $request->year_id;
    $class_group = $request->class_group;
    $regs = $request->id;

    foreach ( $regs as $reg ) {

            StudentClass::where( [
                [ 'reg_no', '=', $reg ], ] )->update( [ 'year_id'=> $year_id,'intake_category_id'=>$class_group, 'class_year'=>$year_id,
                'year_of_study' => $class_group
            ] );

            Student::where( [
                [ 'reg_no', '=', $reg ],
            ] )->update( [
                'class_year'=> $year_id, 'year_id'=> $year_id,
                'intake_category_id'=>$class_group,
                'year_of_study' => $class_group
            ] );
        }

        return redirect()->back()->with( [ 'message'=>'Students Updated Successfully..!' ] )->withInput( $request->all() );

    }

    public function  registermodule() {
        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Limit Uploads' ] );

        return view( 'dashboard.administrations.registerstudent', $data );

    }

    public function studentregister( Request $request ) {
        $data[ 'bc' ] = array( [ 'link' => route( 'dashboard' ), 'page' => 'Dashboard' ], [ 'link' => '#', 'page' => 'Limit Uploads' ] );
        $search = $request->search;
        $data[ 'student' ] = Student::where( 'reg_no', $search )->get();
        $data[ 'semester' ] = Semester::all();
        $data[ 'course' ]  = Course::all();
        $data[ 'year' ]  = AcademicYear::all();

        //  dd( $data[ 'student' ] );
        // return view( 'dashboard.administrations.coursestudentregister', $data );

    }

}
