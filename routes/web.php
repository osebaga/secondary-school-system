<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Settings\CombinationCourseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RequestPasswordController;
use App\Http\Controllers\Dashboard\Administrations\AdministrationController;
use App\Http\Controllers\Dashboard\AdmissionController;
use App\Http\Controllers\Dashboard\ElectionController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Database\DatabaseQueryController;
use App\Http\Controllers\Dashboard\Examination\ExaminationController;
use App\Http\Controllers\Dashboard\Examination\ExcelController;
use App\Http\Controllers\Dashboard\Examination\CourseResultController;
use App\Http\Controllers\Dashboard\Examination\PdfController;
use App\Http\Controllers\Dashboard\GuideController;
use App\Http\Controllers\Dashboard\Role\AbilitiesController;
use App\Http\Controllers\Dashboard\Role\RolesController;
use App\Http\Controllers\Dashboard\Settings\CombinationController;
use App\Http\Controllers\Dashboard\Settings\AcademicYearController;
use App\Http\Controllers\Dashboard\Settings\AttachmentController;
use App\Http\Controllers\Dashboard\Settings\IntakeCategoryController;
use App\Http\Controllers\Dashboard\Settings\BuildingController;
use App\Http\Controllers\Dashboard\Settings\CampusController;
use App\Http\Controllers\Dashboard\Settings\CourseController;
use App\Http\Controllers\Dashboard\Settings\DepartmentController;
use App\Http\Controllers\Dashboard\Settings\ExamCategoryController;
use App\Http\Controllers\Dashboard\Settings\ExamRegulationController;
use App\Http\Controllers\Dashboard\Settings\FacultyController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\Dashboard\Settings\GpaClassificationController;
use App\Http\Controllers\Dashboard\Settings\GradeController;
use App\Http\Controllers\Dashboard\Settings\GradeSchemeController;
use App\Http\Controllers\Dashboard\Settings\InstitutionController;
use App\Http\Controllers\Dashboard\Settings\PositionController;
use App\Http\Controllers\Dashboard\Settings\ProgramController;
use App\Http\Controllers\Dashboard\Settings\ProgrammeCourseController;
use App\Http\Controllers\Dashboard\Settings\SemesterController;
use App\Http\Controllers\Dashboard\Settings\SettingController;
use App\Http\Controllers\Dashboard\Settings\SponsorController;
use App\Http\Controllers\Dashboard\Settings\StudyLevelController;
use App\Http\Controllers\Dashboard\StaffController;

use App\Http\Controllers\Dashboard\StudentPanelController;
use App\Http\Controllers\Dashboard\Students\StudentController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\accommodations\AccommodationController;
use App\Http\Controllers\AgeingAnalysisController;
use App\Http\Controllers\Dashboard\Reports\ExcelReportController;
use FontLib\Table\Type\name;
use App\Http\Controllers\AjaxRequestController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Payment\MakePaymentController;
use App\Http\Controllers\Payment\PaidPaymentController;
use App\Http\Controllers\StudentBillController;
use App\Http\Controllers\StudentMonthlyPaymentController;
use App\Models\FeeStructure;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Psr7\Request;


Route::get('/payment', function () {

    return view('payment.form', [
        'fees' => FeeStructure::all()
    ]);
});

Route::get('get-bill/{id}', function ($id) {

    $fee = FeeStructure::find($id);

    return response()->json(['amount' => $fee->amount], 200);
});

Route::post('/payments', [PaymentController::class, 'get_payments'])->name('fee.update');


Route::post('dashboard/payment/ctlnumber', [PaymentController::class, 'initiate_payment_process']);


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...

Route::get('password/reset', [RequestPasswordController::class, 'resetpassword'])->name('password.request');
Route::post('password/email', [RequestPasswordController::class, 'sendpassword'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('send-mail', [MailController::class, 'sendcontrolno']);

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('dashboard/users/get-users', [UserController::class, 'getUsers'])->name('get-users');
    Route::resource('dashboard/users', UserController::class);

    //Database QUERY ROUTE
    Route::any('dashboard/database-query', [DatabaseQueryController::class, 'databaseQuery'])->name('database.query');
    //User Profile
    Route::get('dashboard/users/{user}/profile', [UserController::class, 'profile'])->name('profile');
    Route::patch('dashboard/users/{user}/update', [UserController::class, 'profileUpdate'])->name('users.update.details');

    Route::patch('dashboard/users/{user}/update/password', [UserController::class, 'changePassword'])->name('users.update.password');
    Route::patch('dashboard/users/{user}/update/avatar', ['as' => 'users.update.avatar', 'uses' => [UserController::class, 'updateAvatar']]);

    //STAFF ROUTES GO HERE

    Route::get('dashboard/staffs/profile/{staff?}', [StaffController::class, 'profile'])->name('staffs.profile');
    Route::get('dashboard/staffs/create-staff', [StaffController::class, 'create'])->name('staffs.register');
    Route::patch('dashboard/staffs/{staff}/update', [StaffController::class, 'updateProfile'])->name('staffs.update.details');
    Route::patch('dashboard/staffs/{staff}/update/password', [StaffController::class, 'changePassword'])->name('staffs.update.password');
    Route::patch('dashboard/staffs/{staff}/update/avatar', [StaffController::class, 'updateAvatar'])->name('staffs.update.avatar');

    Route::get('dashboard/staffs/get-staffs/{faculty}', [StaffController::class, 'getJsonStaffs'])->name('staffs.get-staffs');
    Route::get('dashboard/staffs/change-year', [StaffController::class, 'changeAcademicYear'])->name('staffs.change-year');
    Route::patch('dashboard/staffs/update-year/{staff_id}', [StaffController::class, 'changeAcademicYearUpdate'])->name('staffs.update-year');

    Route::get('dashboard/staffs/campuses', [StaffController::class, 'campuses'])->name('staffs.campuses');

    Route::get('dashboard/staffs/{faculty}', [StaffController::class, 'index'])->name('staffs.index');

    Route::resource('dashboard/staffs', StaffController::class, ['except' => ['index']]);

    //Position ROUTES GO HERE
    Route::get('dashboard/positions/get-positions', [PositionController::class, 'getJsonPositions'])->name('positions.get-positions');
    Route::resource('dashboard/positions', PositionController::class);
    //Building ROUTES GO HERE
    Route::get('dashboard/buildings/get-buildings', [BuildingController::class, 'getJsonBuildings'])->name('buildings.get-buildings');
    Route::resource('dashboard/buildings', BuildingController::class);

    //SEMETER ROUTES
    Route::get('dashboard/semesters/get-semesters', [SemesterController::class, 'getJsonSemesters'])->name('semesters.get-semesters');
    Route::resource('dashboard/semesters', SemesterController::class);

    //ADMISSION ROUTES GO HERE
    Route::get('dashboard/blockedstudent', [AdmissionController::class, 'blockedstudent'])->name('blocked.student');
    Route::post('dashboard/blockedstudents', [AdmissionController::class, 'postblockedStudentImport'])->name('blocked.student.import');
    Route::post('dashboard/blocked-students', [AdmissionController::class, 'unblockedStudent'])->name('unblocked.student');
    Route::get('dashboard/blocked-student/{id}', [AdmissionController::class, 'unbSingleStudent'])->name('unsingle.student');

    Route::get('dashboard/admissions/student/import-oas', [AdmissionController::class, 'importStudentFromOAS'])->name('import.student.oas');

    Route::get('dashboard/enroll/student', [AdmissionController::class, 'admitStudent'])->name('enroll.student');
    Route::get('dashboard/enroll/new/student/{batch}', [AdmissionController::class, 'enrollNewIntakeStudent'])->name('enroll.new.student');
    Route::post('dashboard/enroll/new/student', [AdmissionController::class, 'admitStore'])->name('admit.new.store');

    Route::get('/get-centers/{campus_id}', [AdmissionController::class, 'getCentersByCampus'])->name('get.centers');


    Route::get('dashboard/admissions/get-admitted-students/{campus}', [AdmissionController::class, 'getJsonAdmittedStudents'])->name('admissions.get-admitted-students');
    Route::get('dashboard/admissions/student/{user_id}/{cumpus}/info', [AdmissionController::class, 'studentAdmissionInfo'])->name('admissions.student-info');
    Route::patch('dashboard/admissions/student/{user_id}/update/info', [AdmissionController::class, 'updateStudentAdmissionInfo'])->name('admissions.update-admission-info');
    Route::get('dashboard/admissions/student/{user_id}/edit', [AdmissionController::class, 'editStudent'])->name('admissions.student-edit');
    Route::patch('dashboard/admissions/students/{user_id}/update-student', [AdmissionController::class, 'updateStudent'])->name('admissions.update-student.details');
    Route::delete('dashboard/admissions/students/{user_id}/delete-student', [AdmissionController::class, 'deleteStudent'])->name('admissions-student.destroy');

    Route::get('dashboard/admissions/student/{user_id}/change-programme', [AdmissionController::class, 'changeStudentAcademicProgramme'])->name('admissions.student-change-programme');
    Route::patch('dashboard/admissions/students/{user_id}/update-programme', [AdmissionController::class, 'updateStudent'])->name('admissions.update-student-programme');
    //search students
    Route::any('dashboard/admissions/search-student', [AdmissionController::class, 'searchStudent'])->name('admissions.student-search');
    Route::any('dashboard/admissions/candidate-transcript', [AdmissionController::class, 'candidate_transcript'])->name('admissions.candidate-transcript');
    Route::post('dashboard/admissions/candidate-transcript', [AdmissionController::class, 'candidate_transcript'])->name('candidate-transcript');
    // Candidate Statement
    Route::get('dashboard/admissions/candidate-statement', [AdmissionController::class, 'candidate_statement'])->name('admissions.candidate-statement');
    Route::post('dashboard/admissions/candidate-statement', [AdmissionController::class, 'candidate_statement'])->name('candidate-statement');
    //students excell import
    Route::get('dashboard/students/excels', [ExcelController::class, 'import_students'])->name('excels.import-students');
    Route::post('dashboard/students/excels/store', [ExcelController::class, 'import_student_store'])->name('excels.import-student-stores');
    Route::get('dashbaord/exams/exomfofficersemesterresult', [StudentController::class, 'exportsemeserresult'])->name('excels.export.semesterresult');

    Route::get('dashboard/administrations/student-remark', [StudentController::class, 'student_remark'])->name('dashabord.administration.student_remark');
    Route::get('autocomplete', [StudentController::class, 'autocomplete'])->name('autocomplete');
    Route::post('dashboard/administrations/update-student-remark', [StudentController::class, 'update_student_remark'])->name('dashabord.administration.update_student_remark');

    //USER MANUAL CONTROLLER
    Route::get('guides', [GuideController::class, 'admin'])->name('admin.usermanual');

    Route::get('dashboard/fortrial', [AdmissionController::class, 'fortrial'])->name('admissions.fortrial');

    Route::get('dashboard/admissions/upload-history', [AdmissionController::class, 'uploadHistory'])->name('admissions.upload-history');
    Route::get('dashboard/admissions/campus', [AdmissionController::class, 'campus'])->name('admissions.campus');
    Route::get('dashboard/admissions/campus/{campus}', [AdmissionController::class, 'index'])->name('admissions.index');
    Route::get('dashboard/admissions/destroy/{id}', [AdmissionController::class, 'delete'])->name('admissions.delete');
    Route::get('dashboard/admissions/logs', [AdmissionController::class, 'studentlogs'])->name('admissions.studentslogs');
    Route::get('dashboard/admissions/restore/{id}', [AdmissionController::class, 'restorelogs'])->name('admissions.restorelogs');
    Route::post('dashboard/admissions/restorecheck', [AdmissionController::class, 'restorecheck'])->name('admissions.restorecheck');

    //    profile update
    Route::get('dashboard/admissions/load-avatar-update-modal/{std}', [AdmissionController::class, 'loadAvatarUpdateModal'])->name('admissions.modal.update.avatar');
    Route::get('dashboard/admissions/load-study-program-update-modal/{std}', [AdmissionController::class, 'loadStudyProgramInfoModal'])->name('admissions.modal.update.study-program');

    Route::get('dashboard/admissions/load-edu-history-add-modal/{std}', [AdmissionController::class, 'loadEduHistoryModal'])->name('admissions.modal.add.edu-history');
    Route::get('dashboard/admissions/load-bank-info-modal/{std}', [AdmissionController::class, 'loadBankInfoModal'])->name('admissions.modal.add.bank-info');
    Route::get('dashboard/admissions/load-dependant-add-modal/{std}', [AdmissionController::class, 'loadDependantModal'])->name('admissions.modal.add.dependant');
    Route::get('dashboard/admissions/load-next-of-kin-add-modal/{std}', [AdmissionController::class, 'loadNextOfKinModal'])->name('admissions.modal.add.next-of-kin');
    Route::get('dashboard/admissions/load-contact-info-update-modal/{std}', [AdmissionController::class, 'loadContactInfoModal'])->name('admissions.modal.update.contact-info');

    Route::patch('dashboard/admissions/avatar-update/{std}', [AdmissionController::class, 'updateAvatar'])->name('admissions.update.avatar');
    Route::patch('dashboard/admissions/study-program-update/{std}', [AdmissionController::class, 'updateStudyProgramme'])->name('admissions.update.study-program');

    Route::post('dashboard/admissions/edu-history-add', [AdmissionController::class, 'storeEduHistory'])->name('admissions.store.edu-history');
    Route::post('dashboard/admissions/bank-info-add', [AdmissionController::class, 'storeBankInfo'])->name('admissions.store.bank-info');
    Route::post('dashboard/admissions/dependant-add', [AdmissionController::class, 'storeDependant'])->name('admissions.store.dependant');
    Route::post('dashboard/admissions/next-of-kin-add', [AdmissionController::class, 'storeNextOfKin'])->name('admissions.store.next-of-kin');
    Route::patch('dashboard/admissions/contact-info-update/{std}', [AdmissionController::class, 'updateContact'])->name('admissions.update.contact-info');

    Route::get('dashboard/students/edu-history/{id}', [AdmissionController::class, 'UpdateEduHistory'])->name('students.modal.edit.eduHistory');
    Route::post('dashboard/students/dependant-post', [AdmissionController::class, 'UpdateEduHistoryInfo'])->name('students.modal.update.eduHistory');

    Route::get('dashboard/students/sponsor/{id}', [AdmissionController::class, 'UpdateSponsor'])->name('students.modal.edit.sponsor');
    Route::post('dashboard/students/updatesponsorinfo', [AdmissionController::class, 'UpdateSponsorInfo'])->name('students.modal.update.sponsor');

    Route::get('dashboard/students/bank/{id}', [AdmissionController::class, 'UpdateBankInfo'])->name('students.modal.edit.bankinfo');
    Route::post('dashboard/students/updatebankinfo', [AdmissionController::class, 'UpdateStudentBankInfo'])->name('students.modal.update.bank');

    Route::get('dashboard/students/nextofkin/{id}', [AdmissionController::class, 'UpdateNextOfKin'])->name('students.modal.edit.nextOfKin');
    Route::post('dashboard/students/updatenextofkininfo', [AdmissionController::class, 'UpdateNextOfKinInfo'])->name('students.modal.update.nextOfKin');

    Route::get('dashboard/admissions/dependant-update/{id}', [AdmissionController::class, 'UpdateDependant'])->name('students.modal.edit.dependant');
    Route::post('dashboard/admissions/dependant-post', [AdmissionController::class, 'UpdateDependantInfo'])->name('students.modal.update.dependant');

    Route::get('dashboard/admissions/studentinfo/{std}', [AdmissionController::class, 'loadmodalstudentinformation'])->name('admissions.modal.update.studentinfo');
    Route::patch('dashboard/admissions/studentinfoupdate/{std}', [AdmissionController::class, 'upatestudentinfo'])->name('admissions.modal.update.studentinfoupdate');
    Route::get('dashboard/admissions/studentsponsor/{std}', [AdmissionController::class, 'loadmodalstudentsponsor'])->name('admissions.modal.add.sponsor');
    Route::post('dashboard/admissions/studentsponsoradd', [AdmissionController::class, 'upatestudentsponsor'])->name('admissions.modal.update.studentsponsor');

    Route::resource('dashboard/admissions', AdmissionController::class)->except(['index']);

    Route::get('dashboard/loginhistory', [UserController::class, 'userloginhistory'])->name('user-login-history');
    Route::get('dashboard/electionpost', [ElectionController::class, 'electionpost'])->name('election-post');
    Route::get('dashboard/addelectionpost', [ElectionController::class, 'addelectionpost'])->name('add-election-post');
    Route::post('dashboard/postelectionpost', [ElectionController::class, 'postelectionpost'])->name('post-election-post');

    Route::get('dashboard/addelectioncandidate', [ElectionController::class, 'addelectioncandidate'])->name('add-election-candidate');
    Route::post('dashboard/postelectioncandidate', [ElectionController::class, 'postelectioncandiate'])->name('post-election-candidate');
    Route::post('dashboard/deleteelectioncandidate', [ElectionController::class, 'deleteelectioncandiate'])->name('delete-election-candidate');

    Route::get('dashboard/election', [ElectionController::class, 'election'])->name('election');
    Route::post('dashboard/electionvoting', [ElectionController::class, 'voting'])->name('election-voting');
    Route::get('myform/ajax', [ElectionController::class, 'myformAjax'])->name('myformajax');

    //INSTITUTION ROUTES GO HERE
    Route::get('dashboard/institutions/get-institutions', [InstitutionController::class, 'getJsonInstitutions'])->name('institutions.get-institutions');
    Route::resource('dashboard/institutions', InstitutionController::class);
    //Campuses ROUTES GO HERE
    Route::get('dashboard/campus/get-campuses', [CampusController::class, 'getJsonCampus'])->name('campus.get-campuses');

    Route::resource('dashboard/campus', CampusController::class);

    //CENTER ROUTES GO HERE

    Route::resource('dashboard/center', CenterController::class);

    //FACULTY ROUTES GO HERE
    Route::get('dashboard/faculties/get-faculties', [FacultyController::class, 'getJsonFaculties'])->name('faculties.get-faculties');
    Route::resource('dashboard/faculties', FacultyController::class);

    //DEPARTMENT ROUTES GO HERE
    Route::get('dashboard/departments/get-departments', [DepartmentController::class, 'getJsonDepartments'])->name('departments.get-departments');
    Route::resource('dashboard/departments', DepartmentController::class);

    Route::resource('dashboard/programme', ProgramController::class);
    Route::resource('dashboard/modules', CourseController::class);
    Route::resource('dashboard/register-module', ProgrammeCourseController::class);

    //Combinations Routes below
    Route::get('/combinations/{program}', [CombinationController::class, 'showCombinations']);
    Route::get('dashboard/combinations', [CombinationController::class, 'index'])->name('combinations.get-combinations');
    Route::get('dashboard/combinations/create', [CombinationController::class, 'store'])->name('combinations.create-combination');
    Route::get('dashboard/combination/courses/{id}', [CombinationCourseController::class, 'index'])->name('combination.courses');
    Route::get('dashboard/combination/add-course/{id}', [CombinationCourseController::class, 'store'])->name('combination.add-course');

    Route::get('dashboard/study-level/get-study-levels', [StudyLevelController::class, 'getStudyLevelJson'])->name('study-level.get-levels');
    Route::resource('dashboard/study-level', StudyLevelController::class);

    Route::get('dashboard/sponsor/get-sponsors', [SponsorController::class, 'getSponsorListJson'])->name('sponsor.get-sponsors');
    Route::resource('dashboard/sponsor', SponsorController::class);

    Route::get('dashboard/attachments/get-attachments', [AttachmentController::class, 'getAttachmentJson'])->name('attachments.get-attachments');
    Route::resource('dashboard/attachments', AttachmentController::class);

    //batch routes
    Route::get('dashboard/intake-categories/get-intake-categories', [IntakeCategoryController::class, 'getJsonIntakeCategory'])->name('intake-categories.get-intake-category');
    Route::resource('dashboard/intake-categories', IntakeCategoryController::class);

    //batches courses route
    //   Route::get('dashboard/courses/batches/course-supp-batches/{course}', ['as' => 'courses.supp-batches.get-batches', 'uses' => 'Dashboard\Settings\CourseController@course_supp_batches']);
    //    Route::get('dashboard/courses/batches/course-external-batches/{course}', ['as' => 'courses.external-batches.get-batches', 'uses' => 'Dashboard\Settings\CourseController@course_external_batches']);
    //

    Route::get('dashboard/courses/faculty-department', [CourseController::class, 'coursesOfferingByFacultyDepartments'])->name('courses.faculty-department');
    Route::get('dashboard/courses/shift/colleges-and-schools', [CourseController::class, 'coursesShiftCollegeSchools'])->name('courses.shift.colleges-schools');
    Route::get('dashboard/courses/department-courses/{department}', [CourseController::class, 'departmentCourses'])->name('courses.department-courses');
    Route::get('dashboard/courses/list', [CourseController::class, 'GetCourses'])->name('manage.courses');
    Route::get('module/assignment', [CourseController::class, 'GetModuleList'])->name('assign.module.staff');
    Route::get('module/assignment/courses-list', [CourseController::class, 'getJsonModuleList'])->name('assignment.courses-list');


    Route::get('dashboard/courses/shift/department-courses/{department}', [CourseController::class, 'courses_Shift_Panel'])->name('courses.shift.department-courses');
    Route::get('dashboard/courses/shift/department-courses/{program_type}/{id}', [CourseController::class, 'shift_course'])->name('courses.shift');
    Route::get('dashboard/courses/unshift/department-courses/{program_type}/{id}', [CourseController::class, 'unshift_course'])->name('courses.unshift');

    Route::get('dashboard/courses/config/faculty_department', [CourseController::class, 'coursesOfferingConfigByDepartment'])->name('courses.config.by-department');
    Route::get('dashboard/courses/config/department-courses/{department}/{campus}', [CourseController::class, 'configDepartmentCourses'])->name('courses.config.department-courses');

    Route::get('dashboard/courses/config/course-details/{course}', [CourseController::class, 'courseDetails'])->name('courses.config.course-details');
    Route::get('dashboard/courses/config/course-semester-report/{course}/{batch}', [CourseController::class, 'end_semester_report'])->name('courses.config.course-semester-report');
    Route::get('dashboard/courses/config/course-supplementary-report/{course}', [CourseController::class, 'supplementary_semester_report'])->name('courses.config.course-supplementary-report');
    //Intake category courses route
    Route::get('dashboard/courses/intakes/course-by-intake/{course}', [CourseController::class, 'courseByIntakes'])->name('courses.get-by-intakes');
    Route::get('dashboard/courses/intake/course-supp-intake/{course}', [CourseController::class, 'courseSupplementaryByIntake'])->name('courses.intake.get-intakes');
    Route::get('dashboard/courses/batches/course-external-batches/{course}', [CourseController::class, 'course_external_batches'])->name('courses.external-batches.get-batches');

    Route::post('dashboard/courses/assign-course-staffs', [CourseController::class, 'courseAssignInstructor'])->name('courses.assign-course-staffs');
    Route::delete('dashboard/courses/course-staff-delete', [CourseController::class, 'deleteCourseInstructor'])->name('courses.course-staff-delete');
    Route::get('dashboard/courses/get-department-courses/{department}', [CourseController::class, 'getJsonDepartmentCourses'])->name('courses.get-department-courses');
    Route::get('dashboard/courses-list', [CourseController::class, 'getJsonCourses'])->name('courses.get-courses');

    Route::get('dashboard/courses/config/get-department-courses/{department}', [CourseController::class, 'getJsonConfigDepartmentCourses'])->name('courses.config.get-department-courses');
    Route::get('dashboard/courses/course-profile/{course}', [CourseController::class, 'courseProfile'])->name('courses.course-profile');

    //import courses
    // Route::get('dashboard/courses/faculty-department', [CourseController::class,'coursesOfferingByFacultyDepartments'])->name('courses.faculty-department');

    // Route::get('dashboard/courses/import/new/courses/{department}', [CourseController::class,'importNewCourses'])->name('enroll.new.student');

    //register core subjects
    Route::get('dashboard/settings/register-core-subjects', [SettingController::class, 'indexRegisterCoreSubjects'])->name('register.core.subjects.index');
    Route::post('dashboard/settings/register-core-subjects', [SettingController::class, 'registerCoreSubject'])->name('register.core.subjects');

    //EXAM  UPLOAD
    Route::get('exams/exam-category-download/{course_id}/{type}/{intake}', [ExaminationController::class, 'downloadExamCategoryExcelFormat'])->name('exam.category.download');
    Route::get('exams/exam-upload/course/{course_id}/{intake}/form', [ExaminationController::class, 'uploadCourseAssessmentForm'])->name('exam.upload.form');
    Route::post('exams/exam-upload/course/{course_id}', [ExaminationController::class, 'uploadCourseAssessments2'])->name('exam.upload');
    Route::get('exams/exam-prac-download/{course_id}/{type}/{intake}', [ExaminationController::class, 'downloadExamPracCategoryExcelFormat'])->name('exam.prac.download');
    Route::any('dashboard/examination/search-student', [ExaminationController::class, 'searchStudent'])->name('examination.student.search');

    //EXAM CATEGORY
    Route::get('exam-category/get-exam-category', [ExamCategoryController::class, 'getExamCategoryJson'])->name('exam-category.get-exam-category');
    Route::resource('exam-category', ExamCategoryController::class);

    //grade scheme routes
    Route::get('dashboard/schemes/grade-schemes/get-grade-schemes', [GradeSchemeController::class, 'getJsonGradeSchemes'])->name('grade-schemes.get-grade-schemes');
    Route::resource('dashboard/schemes/grade-schemes', GradeSchemeController::class);
    Route::get('dashboard/grades/shift-grade-scheme', [GradeSchemeController::class, 'shift_grade_scheme'])->name('grades.shift');
    Route::get('dashboard/grades/shift-grade-scheme-by-name/{scheme_id}', [GradeSchemeController::class, 'shift_grade_scheme_by_name'])->name('grades.shift.name');
    Route::get('dashboard/grades/unshift-grade-scheme/{scheme_id}', [GradeSchemeController::class, 'unshift_grade_scheme'])->name('grades.unshift');

    //EXAM REGULATION
    Route::get('dashboard/exam-regulations/get-exam-regulations', [ExamRegulationController::class, 'getJsonExamRegulations'])->name('exam-regulation.get-exam-regulations');
    Route::resource('dashboard/exam-regulations/exam-regulations', ExamRegulationController::class);
    Route::get('dashboard/exam-regulations/shift-exam-regulations', [ExamRegulationController::class, 'shiftExamRegulation'])->name('exam-regulations.shift');
    Route::get('dashboard/exam-regulations/shift-exam-regulations-by-name/{scheme_id}', [ExamRegulationController::class, 'shiftExamRegulationByName'])->name('exam-regulations.shift.name');
    Route::get('dashboard/exam-regulations/unshift-exam-regulations/{scheme_id}', [ExamRegulationController::class, 'unshiftExamRegulation'])->name('exam-regulations.unshift');

    //Grade Routes
    Route::get('dashboard/grades/get-grades/{grade_scheme}', [GradeController::class, 'getJsonGrades'])->name('grades.get-grades');
    Route::get('dashboard/grades/{grade_scheme}', [GradeController::class, 'index'])->name('grades.index');
    Route::get('dashboard/grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
    Route::post('dashboard/grades/store', [GradeController::class, 'store'])->name('grades.store');
    Route::patch('dashboard/grades/{grade}/update', [GradeController::class, 'update'])->name('grades.update');
    Route::delete('dashboard/grades/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');

    //GPA CLASSIFIATIONS
    Route::get('dashboard/gpa-classifications/get-classifications/{class}', [GpaClassificationController::class, 'getJsonGpaClassifications'])->name('gpa-classifications.get-class');
    Route::get('dashboard/gpa-classifications/{class}', [GpaClassificationController::class, 'index'])->name('gpa-classifications.index');
    Route::get('dashboard/gpa-classifications/{class}/edit', [GpaClassificationController::class, 'edit'])->name('gpa-classifications.edit');
    Route::post('dashboard/gpa-classifications/store', [GpaClassificationController::class, 'store'])->name('gpa-classifications.store');
    Route::patch('dashboard/gpa-classifications/{class}/update', [GpaClassificationController::class, 'update'])->name('gpa-classifications.update');
    Route::delete('dashboard/gpa-classifications/{class}', [GpaClassificationController::class, 'destroy'])->name('gpa-classifications.destroy');

    //Staff course Assignment
    Route::get('dashboard/courses/staff-courses', [CourseController::class, 'index'])->name('courses.staff-courses');
    Route::get('dashboard/courses/examofficer-courses', [CourseController::class, 'examofficermoduleresult'])->name('courses.examofficer-courses');
    Route::get('dashboard/courses/staff-assign-course', [CourseController::class, 'instructorAssignCourses'])->name('courses.staff-assign-course');

    //get regisered student in particular course
    Route::get('dashboard/courses/course-studentspdf/{id}', [CourseController::class, 'createPDF'])->name('createpdf');
    Route::get('dashboard/courses/course-students/{course}/{intake}', [CourseController::class, 'courseStudents'])->name('courses.course-students');
    Route::get('dashboard/modules/CA/ESE-results/{course}/{intake}', [CourseController::class, 'CAandESEResults'])->name('ca.ese.results');
    Route::get('dashboard/modules/moduleByintake/{course}', [CourseController::class, 'ModuleByIntake'])->name('get.module.results.by.intakes');

    Route::get('dashboard/courses/get-student-coursework/{course}/{batch}', [CourseController::class, 'getJsonStudentCourseWork'])->name('courses.get-student-coursework');
    Route::get('dashboard/courses/get-student-course-results/{course}/{batch}', [CourseController::class, 'getJsonStudentCourseResult'])->name('courses.get-student-course-results');
    Route::get('dashboard/courses/get-field-course-students/{course}/{batch}', [CourseController::class, 'getJsonFieldCourseStudents'])->name('courses.get-field-course-students');

    Route::get('dashboard/course/config/carry-over-student/{course}', [CourseController::class, 'carryOverStudent'])->name('course.carry-over');
    Route::get('dashboard/course/config/supplementary-student/{course}/{batch}', [CourseController::class, 'supplementaryStudent'])->name('course.supplementary-student');
    Route::get('dashboard/course/config/external-student/{course}/{batch}', [CourseController::class, 'externalStudent'])->name('course.external-student');
    Route::get('dashboard/courses/get-supplementary-students/{course}/{batch}', [CourseController::class, 'getJsonSupplementaryStudent'])->name('courses.get-supplementary-students');
    Route::get('dashboard/courses/get-external-students/{course}/{batch}', [CourseController::class, 'getJsonCourseExternalStudents'])->name('courses.get-external-students');
    Route::get('dashboard/courses/get-carry-students/{course}', [CourseController::class, 'getJsonCarryStudent'])->name('courses.get-carry-students');

    //tools to hand remark on courses.
    Route::get('dashboard/courses/exam-scorecheck', [CourseController::class, 'exam_scorecheck'])->name('get-checkcourse');
    Route::get('dashboard/courses/exam-nullcheck', [CourseController::class, 'checknullese'])->name('get-checknull');

    //Get program participant in A certain course

    Route::get('dashboard/courses/program-participant/{course}', [CourseController::class, 'courseParticipantProgrammes'])->name('courses.course-program-participant');
    Route::get('dashboard/courses/get-program-participant/{course}', [CourseController::class, 'getJsonCourseParticipantProgrammes'])->name('courses.get-course-program-participant');

    Route::get('dashboard/courses/index', [CourseController::class, 'index'])->name('courses.index');

    // Route::get('dashboard/courses/create/{department}', [CourseController::class, 'create'])->name('courses.create');
    Route::get('dashboard/courses/add', [CourseController::class, 'create_course'])->name('courses.create');

    Route::post('dashboard/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('dashboard/courses/edit/{course}/', [CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('dashboard/courses/update/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('dashboard/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::resource('dashboard/colleges', 'Dashboard\Settings\CollegeController');

    //ACADEMIC YEARS ROUTES GO HERE
    Route::get('dashboard/academic-years/get-academic-years', [AcademicYearController::class, 'getJsonAcademicYears'])->name('academic-years.get-academic-years');

    Route::resource('dashboard/academic-years', AcademicYearController::class);

    //Programs ROUTES GO HERE
    Route::get('dashboard/programs/get-programs', [ProgramController::class, 'getJsonPrograms'])->name('programs.get-programs');

    Route::get('dashboard/programs/create', [ProgramController::class, 'create'])->name('programs.create');

    Route::resource('dashboard/programs', ProgramController::class)->except(['except' => 'create']);

    Route::get('dashboard/program-courses/program', [ProgrammeCourseController::class, 'programModules'])->name('program-courses.program');

    Route::get('dashboard/program-courses/academic-programs/{campus}', [ProgrammeCourseController::class, 'academicPrograms'])->name('program-courses.academic-programs');
    Route::get('dashboard/program-courses/get-academic-programs/{campus}', [ProgrammeCourseController::class, 'getJsonAcademicPrograms'])->name('program-courses.get-academic-programs');
    Route::get('dashboard/programs-courses/program-config/{program}', [ProgrammeCourseController::class, 'programConfiguration'])->name('program-courses.program-config');
    Route::get('dashboard/programs-courses/edit/{program_course}', [ProgrammeCourseController::class, 'edit'])->name('program-courses.edit');

    Route::get('dashboard/programs-courses/{program}/{year_level}', [ProgrammeCourseController::class, 'index'])->name('program-courses.index');
    Route::get('dashboard/programs-courses/create/{program}/{year_level}', [ProgrammeCourseController::class, 'create'])->name('program-courses.create');

    Route::post('dashboard/programs-courses/store', [ProgrammeCourseController::class, 'store'])->name('program-courses.store');
    Route::patch('dashboard/programs-courses/update/{program_course}', [ProgrammeCourseController::class, 'update'])->name('program-courses.update');
    Route::delete('dashboard/programs-courses/destroy/{program_course}', [ProgrammeCourseController::class, 'destroy'])->name('program-courses.destroy');

    //PERMISION CONTROLLER
    // Route::get('dashboard/permissions/get-permissions', [PermissionController::class, 'getJsonPermissions'])->name('permissions.get-permissions');
    // Route::resource('dashboard/permissions', PermissionController::class);

    // STUDENT PANEL ROUTE
    Route::get('dashboard/student-panel/campus', [StudentPanelController::class, 'campus'])->name('student-panel.campus');
    Route::get('dashboard/student-panel/{schools}', [StudentPanelController::class, 'index'])->name('student-panel.index');
    Route::get('dashboard/student-panel/get-campus-students/{campus_id}', [StudentPanelController::class, 'getJsonStudentByCampus'])->name('student-panel.get-campus-students');
    Route::get('dashboard/student-panel/get-student-info/{user_id}', [StudentPanelController::class, 'get_student_info'])->name('student-panel.get-student-info');
    Route::get('dashboard/student-panel/get-student-status/{user_id}', [StudentPanelController::class, 'get_student_status'])->name('student-panel.get-student-status');
    Route::post('dashboard/student-panel/update-student-status', [StudentPanelController::class, 'update_student_status'])->name('student-panel.update-student-status');
    Route::post('dashboard/student-panel/update-student-disco-status', [StudentPanelController::class, 'update_student_disco_status'])->name('student-panel.update-student-disco-status');

    Route::get('dashboard/student-panel/course-works/{user_id}', [StudentPanelController::class, 'courseWorks'])->name('student-panel.course-works');
    Route::get('dashboard/student-panel/course-results/{user_id}', [StudentPanelController::class, 'courseResults'])->name('student-panel.course-results');

    Route::get('dashboard/student-panel/student/issues', [StudentPanelController::class, 'issuesIndex'])->name('student-issues');
    Route::get('dashboard/student-panel/student/issues-update', [StudentPanelController::class, 'issuesUpdateIndex'])->name('student-issues-update');
    Route::post('dashboard/student-panel/student/delete-student-issues', [StudentPanelController::class, 'deleteStudent'])->name('delete-student-issues');
    Route::post('dashboard/student-panel/student/update-student-issues', [StudentPanelController::class, 'updateStudent'])->name('update-student-issues');
    Route::get('dashboard/student-panel/student/issues-update-gender', [StudentPanelController::class, 'updateGenderIndex'])->name('student-issues-update-gender');

    //    student profile for admin
    Route::get('dashboard/student-panel/student/profile/{user_id}/{id}', [StudentPanelController::class, 'profile'])->name('student-panel.students.profile');
    Route::patch('dashboard/student-panel/update/{student}', [StudentPanelController::class, 'updateProfile'])->name('student-panel.students.update.details');
    Route::patch('dashboard/student-panel/update/password/{student}', [StudentPanelController::class, 'changePassword'])->name('student-panel.students.update.password');
    Route::patch('dashboard/students/update/avatar//{student}', [StudentPanelController::class, 'updateAvatar'])->name('student-panel.students.update.avatar');
    # new
    // Route::get('dashboard/student/{reg_no}', [StudentPanelController::class,'findStudent'])->name('new-student-search');

    //STUDENT ROUTES GO HERE
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::get('students/my-profile', [StudentController::class, 'studentProfile'])->name('students.my-profile');

    Route::get('students/change-password/', [StudentController::class, 'studentChangePassword'])->name('students.changepassword');
    Route::patch('dashboard/students/updatePassword', [StudentController::class, 'studentNewPassword'])->name('students.updateNewPassword');
    Route::patch('students/{student}/update', [StudentController::class, 'updateProfile'])->name('students.update.details');
    Route::patch('students/{student}/update/password', [StudentController::class, 'changePassword'])->name('students.update.password');
    Route::patch('students/{student}/update/avatar', [StudentController::class, 'updateAvatar'])->name('students.update.avatar');
    Route::delete('students/{student}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');

    //route for student to register courses
    Route::get('students/student-course-registration', [StudentController::class, 'studentCoursesRegistration'])->name('students.course-registration');
    Route::post('students/store', [StudentController::class, 'storeCourses'])->name('students.store-courses');

    Route::get('students/push', [StudentController::class, 'pushstudentcourse'])->name('students.push.courses');
    Route::get('students/pushcourse/{id}', [StudentController::class, 'pushcourses'])->name('students.pushcourse');

    //course work and results
    Route::get('students/course-works', [StudentController::class, 'courseWorks'])->name('students.course-works');
    Route::get('students/course-results', [StudentController::class, 'StudentCourseResult'])->name('students.course-results');
    Route::get('students/my-courses', [StudentController::class, 'studentMyCourse'])->name('students.my-courses');
    Route::get('students/students-course-results/{id}', [StudentController::class, 'CourseResults'])->name('endsemestercourse-results');

    //END STUDENT

    //REPORT ROUTES
    //LUKA editing
    Route::get('dashboard/reports/campus', ['as' => 'reports.campus', 'uses' => 'Dashboard\Reports\ReportController@schools']);
    Route::get('dashboard/reports/campus/semester', ['as' => 'reports.campus.semester', 'uses' => 'Dashboard\Reports\ReportController@Schools_semester']);
    Route::get('dashboard/reports/campus/annual', ['as' => 'reports.campus.annual', 'uses' => 'Dashboard\Reports\ReportController@Schools_annual']);
    Route::any('dashboard/reports/generate_report_course/{academic_year}/{year_of_study}/{semester}/{department_id}/{course_id}/{program_code}/{batch_no}', ['as' => 'reports.generate.course', 'uses' => 'Dashboard\Reports\ReportController@generateReportByCourse']);
    Route::any('dashboard/reports/generate_report_semester/{academic_year}/{year_of_study}/{semester}/{department_id}/{program_id}/{batch_no}', ['as' => 'reports.generate.semester', 'uses' => 'Dashboard\Reports\ReportController@generateReportBySemester']);
    Route::any('dashboard/reports/generate_report_annual/{academic_year}/{year_of_study}/{semester}/{department_id}/{program_id}/{batch_no}', ['as' => 'reports.generate.annual', 'uses' => 'Dashboard\Reports\ReportController@generateReportByAnnual']);
    Route::any('dashboard/reports/{school}', ['as' => 'reports.index', 'uses' => 'Dashboard\Reports\ReportController@index']);
    Route::any('dashboard/reports/semester/{school}', ['as' => 'reports.index.semester', 'uses' => 'Dashboard\Reports\ReportController@index_semester']);
    Route::any('dashboard/reports/annual/{school}', ['as' => 'reports.index.annual', 'uses' => 'Dashboard\Reports\ReportController@index_annual']);
    //Route::get('dashboard/reports',['as'=>'reports.index','uses'=>'Dashboard\Reports\ReportController2@index']);
    Route::get('dashboard/reports/modules/{program_id}', ['as' => 'reports.modules', 'uses' => 'Dashboard\Reports\ReportController@getModules']);
    Route::get('dashboard/reports/modules/department/{department_id}/{faculty_id}', ['as' => 'reports.modules.department', 'uses' => 'Dashboard\Reports\ReportController@getCourseByDepartment']);
    Route::get('dashboard/reports/modules/programme/{course_id}', ['as' => 'reports.modules.course.programme', 'uses' => 'Dashboard\Reports\ReportController@get_programme_participant_course']);
    Route::get('dashboard/reports/modules/department/semester/{department_id}/{faculty_id}', ['as' => 'reports.modules.department.semester', 'uses' => 'Dashboard\Reports\ReportController@getProgrammeByDepartment']);
    Route::post('dashboard/reports/module_reports', ['as' => 'reports.module_reports', 'uses' => 'Dashboard\Reports\ReportController@getCourseReport']);
    Route::get('dashboard/reports/batches/course-batches/{course}', ['as' => 'reports.batches.get-batches', 'uses' => 'Dashboard\Reports\ReportController@report_batches_report']);

    Route::post('dashboard/reports/course/course_result', [PdfController::class, 'courseresultPdf'])->name('report.courseresultpdf');
    Route::post('dashboard/reports/course/course_result', [StudentController::class, 'couresresultexamofficer'])->name('report.courseresult');
    Route::get('dashboard/reports/course/semester_results', [StudentController::class, 'getexamofficersemesterresult'])->name('report.semester_results');
    Route::get('dashboard/reports/course/nacte_results', [StudentController::class, 'getexamofficerNacterresult'])->name('report.nacte_results');
    Route::get('dashboard/reports/course/annual_results', [StudentController::class, 'getexamofficerAnnualresult'])->name('report.annual_results');
    Route::post('dashboard/reports/course/semester_result', [StudentController::class, 'examofficersemesterresult'])->name('report.semester_result');
    Route::get('dashboard/reports/course/coursework_result', [StudentController::class, 'examofficercourseworkresult'])->name('report.coursework_result');
    Route::post('dashboard/reports/course/coursework', [StudentController::class, 'getcabyprogram'])->name('get.caby.program');

    Route::post('dashboard/reports/course/semester_test_result', [ExcelReportController::class, 'generateSemisterReport'])->name('report.semester_test_result');
    Route::post('dashboard/reports/course/annual_test_result', [ExcelReportController::class, 'generateAnnualReport'])->name('report.annual_test_result');
    // Route::post('dashboard/reports/course/nacte_test_result',[ExcelReportController::class,'generateNacteReport'])->name('report.nacte_test_result');
    Route::post('dashboard/reports/course/nacte_test_result', [StudentController::class, 'examofficersemesterresult'])->name('report.nacte_test_result');

    //Students
    //restore logs
    Route::get('dashboard/register/show-deleted-students', [RegisterController::class, 'showrestoreLogs'])->name('register.show-deleted-students');
    Route::post('dashboard/register/delete-completed', [RegisterController::class, 'completedelete'])->name('register.complete-delete');
    Route::post('dashboard/register/restore-students', [RegisterController::class, 'studentrestore'])->name('register.restore-deleted');

    //ROLES AND ABILITY ROUTES
    Route::post('abilities/destroy', [AbilitiesController::class, 'massDestroy'])->name('abilities.massDestroy');
    Route::resource('abilities', AbilitiesController::class);
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    //    //ROLES CONTROLLER
    //    Route::resource('dashboard/roles', RoleController::class);
    //    Route::get('dashboard/role/list-roles', ['as' => 'role-list', 'uses' => [RoleController::class,'index']]);
    //    Route::get('dashboard/role/getRoles-json',  [RoleController::class,'getRoles'])->name('getRoles');

    //EXAM CATEGORY
    Route::get('dashboard/exams/category', [ExamCategoryController::class, 'index'])->name('exams.category');
    Route::post('dashboard/exams/categories', [ExamCategoryController::class, 'store'])->name('exams.categories');
    Route::get('dashboard/exams/category/{cat}', [ExamCategoryController::class, 'show'])->name('exams.category.preview');
    Route::patch('dashboard/exams/category/{cat}', [ExamCategoryController::class, 'update'])->name('exams.category.edit');

    //Administration Routes
    Route::get('dashboard/administrations/{view}/campus', [AdministrationController::class, 'campus'])->name('administrations.campus');
    Route::get('dashboard/administrations/{view}/{campus}/intakes', [AdministrationController::class, 'intakeCategory'])->name('administrations.intakes');
    Route::get('dashboard/administrations/{campus}/{intake}/upload-limit', [AdministrationController::class, 'limitUpload'])->name('administrations.limit-uploads');
    Route::get('dashboard/administrations/update-class-list', [AdministrationController::class, 'updateClassList'])->name('update.class.lists');
    Route::post('dashboard/administrations/get-class-list', [AdministrationController::class, 'getClassList'])->name('get.class.lists');
    //this is for updating classlist
    Route::post('dashboard/administrations/update-class-list', [AdministrationController::class, 'RegNewClassList'])->name('register.class.lists');

    //Semester 1 upload
    Route::post('dashboard/administrations/open-upload-sem-one', [AdministrationController::class, 'openUploadSemOne'])->name('administrations.open-upload-sem-one');
    Route::post('dashboard/administrations/close-upload-sem-one', [AdministrationController::class, 'closeUploadSemOne'])->name('administrations.close-upload-sem-one');
    //Semester 2 upload
    Route::post('dashboard/administrations/open-upload-sem-two', [AdministrationController::class, 'openUploadSemTwo'])->name('administrations.open-upload-sem-two');
    Route::post('dashboard/administrations/close-upload-sem-two', [AdministrationController::class, 'closeUploadSemTwo'])->name('administrations.close-upload-sem-two');

    //publish exams
    Route::get('dashboard/administrations/{campus}/{intake}/publish-exams', [AdministrationController::class, 'publishExam'])->name('administrations.publish-exams');
    //Semester 1 publish exams
    Route::post('dashboard/administrations/publish-exam-sem-one', [AdministrationController::class, 'publishExamSemOne'])->name('administrations.publishExamSemOne');
    Route::post('dashboard/administrations/un-publish-exam-sem-one', [AdministrationController::class, 'unPublishExamSemOne'])->name('administrations.unPublishExamSemOne');
    //Semester 2 publish exams
    Route::post('dashboard/administrations/publish-exam-sem-two', [AdministrationController::class, 'publishExamSemTwo'])->name('administrations.publishExamSemTwo');
    Route::post('dashboard/administrations/un-publish-exam-sem-two', [AdministrationController::class, 'unPublishExamSemTwo'])->name('administrations.unPublishExamSemTwo');

    //Limit student course registration
    Route::get('dashboard/administrations/{campus}/{intake}/limit-course-registration', [AdministrationController::class, 'limitCourseRegistration'])->name('administrations.limitCourseRegistration');
    Route::post('dashboard/administrations/open-course-registration/{semester}', [AdministrationController::class, 'openCourseRegistration'])->name('administrations.openCourseRegistration');
    Route::post('dashboard/administrations/close-course-registration/{semester}', [AdministrationController::class, 'closeCourseRegistration'])->name('administrations.closeCourseRegistration');

    //register student if missed on course
    Route::get('dashboard/administrations/student-register-course', [AdministrationController::class, 'registermodule'])->name('administrations.register-student-module');
    Route::post('dashboard/administrations/student-registermodule', [AdministrationController::class, 'studentregister'])->name('administrations.register-student-course');

    // Password Reset Routes...
    //Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('auth.password.reset');
    //Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('auth.password.reset');
    //Route::get('/password', [RequestPasswordController::class,'resetpassword'])->name('password');
    // Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('auth.password.reset');

    // for trial only

    //results
    Route::get('dashboard/examination/courseresult', [CourseResultController::class, 'getCourseResult'])->name('examination.course.result');

    // ACCOMMODATIONS ROUTE
    # For the Hostels
    Route::get('dashboard/hostels/createhostel', [AccommodationController::class, 'registerhostel'])->name('register.hostel');
    Route::get('dashboard/hostels/view', [AccommodationController::class, 'viewhostel'])->name('view.hostel');
    Route::post('dashboard/hostel/store', [AccommodationController::class, 'posthostel'])->name('store.hostel');
    Route::get('hostels/export/', [HostelController::class, 'export'])->name('export.hostel');

    # For the Blocks
    Route::get('dashboard/blocks', [AccommodationController::class, 'registerblock'])->name('register.block');
    Route::post('dashboard/blocks/store', [AccommodationController::class, 'postblock'])->name('block.store');
    Route::get('dashboard/block/view', [AccommodationController::class, 'viewblock'])->name('view.block');
    Route::get('dashboard/block/delete', [AccommodationController::class, 'deleteblock'])->name('remove.block');

    # For the Rooms
    Route::get('dashboard/rooms/add', [AccommodationController::class, 'addroom'])->name('create.room');
    Route::post('dashboard/room/store', [AccommodationController::class, 'postroom'])->name('store.room');
    Route::get('dashboard/room/view', [AccommodationController::class, 'viewroom'])->name('view.room');

    Route::get('dashboard/application', [AccommodationController::class, 'roomapplication'])->name('roomapplication');
    Route::post('dashboard/application', [AccommodationController::class, 'storeroomapplication'])->name('store.application');

    Route::get('dashboard/applications', [AccommodationController::class, 'index'])->name('applications');
    Route::get('dashboard/rooms/vacancy', [AccommodationController::class, 'showVacantRooms'])->name('vacant-rooms');

    # Allocations
    Route::get('dashboard/rooms/allocations', [AccommodationController::class, 'getCurrentAllocations'])->name('rooms.allocations');
    Route::get('dashboard/rooms/allocation/{reg_no}', [AccommodationController::class, 'getAllocationForm'])->name('room-allocation-form');
    Route::post('dashboard/rooms/allocation/store', [AccommodationController::class, 'storeAllocation'])->name('store-allocation');

    #student import bills

    Route::match(['get', 'post'], '/accounts/student-bills', [StudentBillController::class, 'importStudentBills'])->name('student-bills.import');
    Route::match(['get', 'post'], '/accounts/student-monthy-payment', [StudentMonthlyPaymentController::class, 'importStudentPayments'])->name('student.monthy.payment.import');    
    Route::get('/accounts/report/aging', [AgeingAnalysisController::class, 'ageingReport'])->name('report.aging');
    Route::get('/accounts/export-student-bill-template', [StudentBillController::class, 'exportTemplate'])->name('export-student-bill-template');
    Route::get('/accounts/export-student-monthly-template', [StudentMonthlyPaymentController::class, 'exportMonthlyTemplate'])->name('export-student-monthly-template');
    
    #export ECL reports
    Route::get('/report/aging/export', [AgeingAnalysisController::class, 'exportAgingReport'])->name('report.aging.export');

    #Payments
    Route::get('accounts/payments', [PaymentController::class, 'index'])->name('payment');
    Route::get('accounts/receipt/{no}', [PaymentController::class, 'generate_receipt'])->name('generate_receipt');
    Route::get('accounts/payments/paid', [PaymentController::class, 'index2'])->name('payment.paid');
    Route::get('accounts/payments/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('accounts/payment/ctlnumber2', [PaymentController::class, 'store']);
    Route::get('accounts/feestructures', [PaymentController::class, 'show_fee_form'])->name('feestructure');
    Route::post('accounts/store-fee', [PaymentController::class, 'store_fee_structure'])->name('store-fee');
    Route::get('accounts/delete-fee/{id}', [PaymentController::class, 'delete_fee_structure'])->name('fee.delete');
    Route::get('accounts/edit-fee/{id}', [PaymentController::class, 'edit_fee_structure'])->name('fee.edit');
    Route::post('accounts/update-fee/{id}', [PaymentController::class, 'update_fee_structure'])->name('fee.update');

    // make payment
    Route::get('accounts/make-payments', [MakePaymentController::class, 'index'])->name('make_payment');
    Route::get('accounts/view-payment-options/{controlNo}', [MakePaymentController::class, 'showPaymentOptions'])->name('view_payment_options');
    // payment list (paid payments)
    Route::get('accounts/paid-payments', [PaidPaymentController::class, 'index'])->name('payment_list');

    //Financial officer
    Route::get('accounts/billing/ctlNo', [PaymentController::class, 'create_ctl_no'])->name('reference_number');
    Route::get('accounts/billing/payments', [PaymentController::class, 'payment_list'])->name('collection_summary');
    Route::get('accounts/billing/invoices', [PaymentController::class, 'invoice_list'])->name('invoices');
    Route::get('accounts/billing/receipt/{no}', [PaymentController::class, 'download_receipt'])->name('download_receipt');
    Route::get('accounts/billing/payment-receipt/{regno}', [PaymentController::class, 'download_receipt_by_regno'])->name('payment_receipt');
    Route::get('accounts/billing/receiptctlno/{ctl}', [PaymentController::class, 'download_receipt_by_ctlno'])->name('receipt_by_ctlno');
    Route::post('accounts/billing/store/ctlno', [PaymentController::class, 'store_ctl_number']);
    Route::get('accounts/billing/debtorsreport', [DebtorController::class, 'create_debtor_report'])->name('debtor_report');
    Route::get('accounts/billing/debtor-list', [DebtorController::class, 'debtor_report_list'])->name('debtor_report_list');
    Route::get('accounts/billing/student-statement/{reg_no}', [DebtorController::class, 'download_statement_by_regno'])->name('statement_report');
    Route::get('get-std-name/{reg_no}', function ($reg_no) {
        $std_name = User::where('username', $reg_no)->first();
        return response()->json(['first_name' => $std_name->first_name, 'last_name' => $std_name->last_name], 200);
    });
});

//Ajax Routes
Route::get('/get-campuses/{institution}', [AjaxRequestController::class, 'getInstitutionCampuses'])->name('institution.campuses');
Route::get('/get-faculties/{campus}', [AjaxRequestController::class, 'getCampusFaculties'])->name('campus.faculties');
Route::post('/get-student-coursework', [AjaxRequestController::class, 'getStudentsCourseWork']);
Route::get('/get-faculties/{campus_id}', [AjaxRequestController::class, 'getCampusFaculties'])->name('campus.faculties');
Route::get('/get-program-types/{faculty_id}', [AjaxRequestController::class, 'getFacultyProgramTypes'])->name('faculty.program-types');
Route::get('/get-programs/types/{type}', [AjaxRequestController::class, 'getProgramOfGivenType'])->name('faculty.programs.given-type');

Route::get('dashboard/hostels/createhostel', [AccommodationController::class, 'registerhostel'])->name('register.hostel');
