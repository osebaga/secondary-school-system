<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends \Spatie\Permission\Models\Permission
{

    protected $fillable=[
        'name','guard_name'];
    public static function defaultPermissions()
    {
        return [
            'users-manage', 'users-view', 'users-create', 'users-edit', 'users-delete',
            'roles-manage', 'roles-view', 'roles-create', 'roles-edit', 'roles-delete',
            'abilities-manage', 'abilities-view', 'abilities-create', 'abilities-edit', 'abilities-delete',
            'staffs-manage', 'staffs-view', 'staffs-create', 'staffs-edit', 'staffs-delete',
            'settings-manage', 'institutions-manage', 'institutions-view', 'institutions-create', 'institutions-edit', 'institutions-delete',
            'campus-manage', 'campus-view', 'campus-create', 'campus-edit', 'campus-delete',
            'center-manage','center-view','center-create','center-edit','center-delete',
            'faculties-manage','center-view', 'faculties-view', 'faculties-create', 'faculties-edit', 'faculties-delete',
            'study_levels-manage', 'study_levels-view', 'study_levels-create', 'study_levels-edit', 'study_levels-delete',
            'intake_categories-manage', 'intake_categories-view', 'intake_categories-create', 'intake_categories-edit', 'intake_categories-delete',
            'semesters-manage', 'semesters-view', 'semesters-create', 'semesters-edit', 'semesters-delete',
            'admissions-manage', 'admissions-import_student', 'admissions-view', 
            'students-manage', 'students-view', 'students-edit', 'students-delete', 'students-restore',
            'programs-manage', 'programs-view', 'programs-create', 'programs-edit', 'programs-delete',
            'courses-manage', 'courses-view', 'courses-create', 'courses-edit', 'courses-delete', 'courses-register_core_subjects',
            'staffs-change_year', 'academic_years-manage', 'academic_years-view', 'academic_years-create', 'academic_years-edit', 'academic_years-delete',
            'sponsors-manage', 'sponsors-view', 'sponsors-create', 'sponsors-edit', 'sponsors-delete',
            'departments-manage', 'departments-view', 'departments-create', 'departments-edit', 'departments-delete',
            'exam-categories-manage', 'exam-categories-view', 'exam-categories-create', 'exam-categories-edit', 'exam-categories-delete',
            'payments-manage', 'payments-view', 'payments-create', 'payments-edit', 'payments-delete',
            'positions-manage', 'positions-create', 'positions-view', 'positions-delete', 'positions-edit',
            'database-manage', 'database-query', 'admissions-search_students', 'dashboard-view',
            'academics-manage', 'timetable-manage', 'timetable-create', 'timetable-view', 'timetable-edit', 'timetable-delete',
            'administrations-manage', 'administrations-create', 'administrations-view', 'administrations-edit', 'administrations-delete',
            'examinations-manage', 'examinations-create', 'examinations-view', 'examinations-edit', 'examinations-delete', 'examinations-search_student_results',
            'communications-manage', 'communications-create', 'communications-view', 'communications-delete', 'communications-edit',
            'e-voting-manage', 'e-voting-create', 'e-voting-view', 'e-voting-edit', 'e-voting-delete',
            'student_panel-manage', 'courses-assign_to_instructor', 'staffs-profile-manage',
            'grades-manage', 'grades-view', 'grades-create', 'grades-edit', 'grades-delete',
            'gpa-classifications-manage', 'gpa_classifications-view', 'gpa_classifications-create', 'gpa_classifications-edit', 'gpa_classifications-delete',
            'usermanual-view', 'students-logs-manage', 'Student-Remark', 'limit-registration', 'limit-upload', 'change-semester-exam',
            'module-allocation', 'class-list-view', 'update-class-list', 'student-search', 'grade-book-view', 'course-results-view',
            'semester-results-view', 'NTA-semester-results-view', 'annual-results-view', 'candidate-transcript-view', 'candidate-statement',
            'elective-course-view', 'supplementary-report-view', 'special-report-view', 'student-register',
            'publish-exam', 'my-module-list', 'module-offering-view', 'module-config-view', 'staff-modules-view',
            'coursework-results-view', 'blocked-students'
        ];
    }

}
