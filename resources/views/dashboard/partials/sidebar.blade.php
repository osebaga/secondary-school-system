<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft rounded-top" style="background-color: #252525;">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                @if (Auth::user()->isAn('Student'))
                    <li>
                        <a href="{{ route('students.index') }}" class="waves-effect waves-primary"><i
                                class="mdi mdi-18px mdi-view-dashboard"></i><span> Dashboard </span></a>
                    </li>
                    <li>
                        <a href="{{ route('students.my-profile') }}" class="waves-effect waves-primaryx">
                            <i class="mdi mdi-account"></i> <span>Profile </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('students.course-registration') }}">
                            <i class="fa fw fa-file"></i>
                            Subject Registration
                        </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa-fw fa fa-graduation-cap"></i>
                            <span class="menu-arrow"></span>
                            <span>Examination Results</span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{ route('students.course-works') }}">

                                    CA Results
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('students.course-results') }}">

                                    Final Results
                                </a>
                            </li>
                            <li>
                                <a href="#">

                                    Carry Results
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-18px mdi-bank"></i>
                            <span class="menu-arrow"></span>
                            <span>Payments</span>
                        </a>

                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{ route('payment') }}">

                                    Invoices
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('payment_list') }}">

                                    Payment List
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="{{ route('election') }}">
                            <i class="mdi mdi-18px mdi-checkbox-marked-outline"></i>
                            <span class="menu-arrow"></span>
                            <span>Election</span>
                        </a>
                    </li>
                @elseif(!Auth::user()->isAn('Student'))
                    @can('dashboard-view')
                        <li>
                            <a href="{{ url('dashboard') }}" class="waves-effect waves-primary "><i
                                    class="mdi mdi-18px mdi-view-dashboard"></i><span> Dashboard</span></a>
                        </li>
                    @endcan
                    @can(['settings-manage'])
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect waves-primary">
                                <i class="fa-fw fa fa-cogs"></i>
                                <span>General Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                @can('institutions-view')
                                    <li><a href="{{ route('institutions.index') }}">
                                            <span>Institution</span></a>
                                    </li>
                                @endcan


                                @can('academic_years-view')
                                    <li><a href="{{ route('academic-years.index') }}">
                                            <span>Academic Year</span></a>
                                    </li>
                                @endcan


                                @can('fee-structure-view')
                                    <li>
                                        <a href="{{ route('feestructure') }}">
                                            Fee Settings
                                        </a>
                                    </li>
                                @endcan
                                @can('fee_types-view')
                                    <li>
                                        <a href="#">

                                            Fee Types
                                        </a>
                                    </li>
                                @endcan

                        </li>
                </ul>
                </li>
            @endcan
            @can('student_panel-manage')
                <li>
                    <a href="{{ route('student-panel.campus') }}"
                        class="waves-effect waves-primary  {{ \Request::is('dashboard/student-panel*') ? 'active' : '' }}">
                        <i class="fa fa-graduation-cap"></i>
                        <span> Student CPanel </span></a>
                </li>
            @endcan
            @can('primary-level')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-book"></i>
                        <span class="menu-arrow"></span>
                        <span>Primary School</span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @can('module-allocation')
                            <li>
                                <a href="#">

                                    Assign Subject
                                </a>
                            </li>
                        @endcan
                        @can('assigned-module-list')
                            <li>
                                <a href="#">

                                    Subject Assigned
                                </a>
                            </li>
                        @endcan

                        @can('limit-registration')
                            <li>
                                <a href="#">

                                    Enrollment Deadline
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('secondary-level')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-book"></i>
                        <span class="menu-arrow"></span>
                        <span>Secondary School</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('module-allocation')
                            <li>
                                <a href="#">

                                    Assign Subject
                                </a>
                            </li>
                        @endcan
                        @can('assigned-module-list')
                            <li>
                                <a href="#">

                                    Subject Assigned
                                </a>
                            </li>
                        @endcan

                        @can('limit-registration')
                            <li>
                                <a href="#">

                                    Enrollment Deadline
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan
            @can('advanced-level')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-book"></i>
                        <span class="menu-arrow"></span>
                        <span>High School</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('module-allocation')
                            <li>
                                <a href="#">

                                    Assign Subject
                                </a>
                            </li>
                        @endcan
                        @can('assigned-module-list')
                            <li>
                                <a href="#">

                                    Subject Assigned
                                </a>
                            </li>
                        @endcan

                        @can('limit-registration')
                            <li>
                                <a href="#">

                                    Enrollment Deadline
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            {{-- @can('database-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-cog"></i>
                        <span class="menu-arrow"></span>
                        <span>{{ trans('cruds.database.title') }}</span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @can('database-query')
                            <li>
                                <a href="{{ route('database.query') }}">
                                    
                                    {{ trans('cruds.database.query') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan --}}
            @can('enrollment-panel-manage')
                <li class="has_sub">
                    <a href="javascript: void(0)" class="waves-effect">
                        <i class="fa fa-desktop"></i>
                        <span class="menu-arrow"></span>
                        <span>Enrollment Panel </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('campus-view')
                            <li><a href="{{ route('campus.index') }}">
                                    <span>School</span></a>
                            </li>
                        @endcan
                        {{-- @can('center-view')
                    <li><a href="{{ route('center.index') }}">
                            <span>Centers</span></a>
                    </li>
                @endcan --}}
                        <li>
                            @can('student-search')
                                <a href="{{ route('admissions.student-search') }}">

                                    Search Student
                                </a>
                            @endcan
                        </li>

                        @can('admissions-import_student')
                            <li>
                                <a href="{{ route('enroll.student') }}">

                                    Enroll Students
                                </a>
                            </li>
                        @endcan
                        @can('admissions-view')
                            <li>
                                <a href="{{ route('admissions.campus') }}">

                                    Enrollment Lists
                                </a>
                            </li>
                        @endcan
                        @can('update-class-list')
                            <li>
                                <a href="{{ route('update.class.lists') }}">

                                    Update Students
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan


            @can('examinations-settings')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-18px mdi-hexagon-multiple"></i>
                        <span class="menu-arrow"></span>
                        <span>Examination Settings</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('departments-view')
                            <li><a href="{{ route('departments.index') }}">
                                    <span> Departments</span></a>
                            </li>
                        @endcan
                        @can('semesters-view')
                            <li><a href="{{ route('semesters.index') }}">
                                    <span>Terms</span></a>
                            </li>
                        @endcan
                        @can('intake_categories-view')
                            <li>
                                <a href="{{ route('intake-categories.index') }}">
                                    Class Group
                                </a>
                            </li>
                        @endcan
                        @can('study_levels-view')
                            <li>
                                <a href="{{ route('study-level.index') }}">
                                    Levels
                                </a>
                            </li>
                        @endcan
                        @can('exam-categories-view')
                            <li>
                                <a href="{{ route('exam-category.index') }}">

                                    Exam Types
                                </a>
                            </li>
                        @endcan

                        @can('module-offering-view')
                            <li><a href="{{ route('manage.courses') }}">
                                    <span>Subjects</span></a>
                            </li>
                        @endcan

                        @can('programs-view')
                            <li><a href="{{ route('program-courses.program') }}">
                                    <span>Program/Division</span></a></li>
                        @endcan
                        @can('limit-registration')
                            <li>
                                <a href="{{ route('administrations.campus', 'limit-course-registration') }}">

                                    Module Enroll Deadline
                                </a>
                            </li>
                        @endcan
                        @can('module-allocation')
                            <li>
                                <a href="{{ route('assign.module.staff') }}">

                                    Assign Module
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('examinations-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa fa-list"></i>
                        <span class="menu-arrow"></span>
                        <span>Examination Results</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('examinations-search_student_results')
                            <li>
                                @can('student-search')
                                    <a href="{{ route('examination.student.search') }}">

                                        Search Student
                                    </a>
                                </li>
                            @endcan
                        @endcan

                        @can('limit-upload')
                            <li>
                                <a href="{{ route('administrations.campus', 'limit-upload') }}">

                                    Upload Deadline
                                </a>
                            </li>
                        @endcan

                        @can('examinations-view')
                            <li>
                                @can('course-results-view')
                                    <a href="{{ route('courses.staff-courses') }}">


                                        Upload Results
                                    </a>
                                @endcan
                            </li>
                        @endcan

                        @can('publish-exam')
                            <li>
                                <a href="{{ route('administrations.campus', 'publish-exam') }}">

                                    Publish Exam
                                </a>
                            </li>
                        @endcan
                        {{-- @can('Student-Remark')
                                <li>
                                    <a href="{{ route('dashabord.administration.student_remark') }}">
                                        
                                        Student Remarks
                                    </a>
                                </li>
                            @endcan --}}
                    </ul>
                </li>
            @endcan

            @endif


            {{-- @if (Auth::user()->isAn('Accountant')) --}}
            @can('accounting-manage')
                       
                {{-- Billing Menu --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                        <span class="menu-arrow"></span>
                        <span>Billing</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('billing-view')
                        <li>
                            <a href="{{route('student-bills.import')}}">Import Bill</a>
                        </li>
                            <li>
                                <a href="{{ route('payment.create') }}">Create Individual Bill</a>
                            </li>
                            <li>
                                <a href="{{ route('invoices') }}">Billing List</a>
                            </li>
                        @endcan
                    </ul>
                </li>
        
                {{-- Payments Menu --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-18px mdi-bank" aria-hidden="true"></i>
                        <span class="menu-arrow"></span>
                        <span>Payments</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('payments-view')
                        <li>
                            <a href="{{ route('student.monthy.payment.import')}}">Import Monthly</a>
                        </li>
                        <li>
                            <a href="#">Miscellaneous</a>
                        </li>
                            <li>
                                <a href="{{ route('collection_summary') }}">Tuition Fee Payments</a>
                            </li>
                        @endcan
                        @can('debtors-view')
                        <li>
                            <a href="{{ route('debtor_report_list') }}">Debtors</a>
                        </li>
                    @endcan
                    @can('ageing-analysis')
                        <li>
                            <a href="{{ route('report.aging')}}">Ageing Analysis</a>
                        </li>
                    @endcan
                    </ul>
                </li>
            @endcan
        {{-- @endif --}}
        
            @can('manage-overall-reports')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-18px mdi-chart-bar"></i>
                        <span class="menu-arrow"></span>
                        <span>Reports</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('coursework-results-view')
                            <li>
                                <a href="{{ route('report.coursework_result') }}">
                                    CA Results
                                </a>
                            </li>
                        @endcan
                        @can('examinations-view')
                            <li>
                                @can('course-results-view')
                                    <a href="{{ route('courses.examofficer-courses') }}">

                                        Course Results
                                    </a>
                                @endcan
                            </li>
                        @endcan
                        @can('examinations-view')
                            <li>
                                @can('semester-results-view')
                                    <a href="{{ route('report.semester_results') }}">

                                        Semester
                                    </a>
                                @endcan
                            </li>
                        @endcan

                        {{-- @can('examinations-view')
                            <li>
                                @can('semester-results-view')
                                    <a href="{{ route('report.nacte_results') }}">
                                        
                                        NACTE Results
                                    </a>
                                @endcan
                            </li>
                        @endcan --}}


                        {{-- @can('examinations-view')
                            <li>
                                @can('annual-results-view')
                                    <a href="{{ route('report.annual_results') }}">
                                        
                                        Annual Results
                                    </a>
                                @endcan
                            </li>
                        @endcan --}}

                        @can('examinations-view')
                            <li>
                                @can('candidate-transcript-view')
                                    <a href="{{ route('admissions.candidate-transcript') }}">

                                        Transcript
                                    </a>
                                @endcan
                            </li>
                        @endcan
                        @can('examinations-view')
                            <li>
                                @can('candidate-transcript-view')
                                    <a href="{{ route('admissions.candidate-statement') }}">

                                        Progress
                                    </a>
                                @endcan
                            </li>
                        @endcan

                        
                    </ul>
                </li>
            @endcan

            {{-- @endif --}}

            @can('hostel-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-graduation-cap"></i>
                        <span class="menu-arrow"></span>
                        <span>Hostel CPanel</span>

                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @can('hostel-create')
                            <li>
                                <a href="{{ route('view.hostel') }}">

                                    Hostel Register
                                </a>
                            </li>
                        @endcan

                        @can('block-create')
                            <li>
                                <a href="{{ route('view.block') }}">

                                    Block Register
                                </a>
                            </li>
                        @endcan

                        @can('room-create')
                            <li>
                                <a href="{{ route('view.room') }}">

                                    Room Register
                                </a>
                            </li>
                        @endcan

                        @can('hostel-view')
                            <li>
                                <a href="{{ route('export.hostel') }}">

                                    Hostel Report
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('accommodation-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa-fw fa fa-graduation-cap"></i>
                        <span class="menu-arrow"></span>
                        <span>Accommodation CPanel</span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        @can('class-list-view')
                            <li>
                                <a href="">

                                    Class Lists
                                </a>
                            </li>
                        @endcan

                        @can('application-create')
                            <li>
                                <a href="{{ route('roomapplication') }}">

                                    Application Form
                                </a>
                            </li>
                        @endcan

                        @can('application-view')
                            <li>
                                <a href="">

                                    Application Report
                                </a>
                            </li>
                        @endcan

                        @can('allocation-create')
                            <li>
                                <a href="{{ route('applications') }}">

                                    Applications
                                </a>
                            </li>
                        @endcan

                        {{-- @can('allocation-create')
                    <li>
                        <a href="">
                            
                            Allocation Form
                        </a>
                    </li>
                    @endcan --}}

                        {{-- @can('allocation-view')
                    <li>
                        <a href="">
                            
                            Allocation Report
                        </a>
                    </li>
                    @endcan --}}

                        @can('vacant-room-view')
                            <li>
                                <a href="{{ route('vacant-rooms') }}">

                                    Vacant Rooms
                                </a>
                            </li>
                        @endcan

                        @can('current-allocation-view')
                            <li>
                                <a href="{{ route('rooms.allocations') }}">

                                    Current Allocation
                                </a>
                            </li>
                        @endcan

                        {{-- @can('room-view')
                    <li>
                        <a href="">
                            
                           Checkout Room
                        </a>
                    </li>
                    @endcan --}}
                    </ul>
                </li>
            @endcan

            {{-- @can('timetable-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="fa fa-calendar"></i>
                        <span class="menu-arrow"></span>
                        <span>Timetable</span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('timetable-create')
                            <li>
                                <a href="{{ route('admissions.campus') }}">
                                    
                                    Get Timetable
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan --}}
            @can('e-voting-manage')
                <li class="has_sub">
                    <a href="{{ route('election-post') }}" class="waves-effect">
                        <i class="mdi mdi-18px mdi-checkbox-marked-outline"></i>
                        <span class="menu-arrow"></span>
                        <span>Election System</span>
                    </a>

                </li>
            @endcan

            @can('courses-register_core_subjects')
                <li>
                    <a href="{{ route('students.push.courses') }}" class="waves-effect waves-primary"><i
                            class="mdi mdi-package"></i><span>Magic Module Register </span></a>
                </li>
            @endcan

            @can('users-manage')
                <li class="has_sub">
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-18px mdi-account-multiple"></i>
                        <span class="menu-arrow"></span>
                        <span>User Control</span>

                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        @can('positions-view')
                            <li>
                                <a href="{{ route('positions.index') }}"
                                    class="waves-effect waves-primary"><span>Positions</span></a>
                            </li>
                        @endcan
                        @can('abilities-view')
                            <li>
                                <a href="{{ route('abilities.index') }}">

                                    {{ trans('cruds.ability.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('roles-view')
                            <li>
                                <a href="{{ route('roles.index') }}">

                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('users-view')
                            <li>
                                <a href="{{ route('users.index') }}">

                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan

                        @can('staffs-view')
                            <li>
                                <a href="{{ route('staffs.campuses') }}">

                                    {{ trans('cruds.staff.title') }}
                                </a>
                            </li>
                        @endcan
                        
                    </ul>
                </li>
            @endcan
                @can('user-login-history')
                
                <li>
                    <a href="{{ route('user-login-history') }}" class="waves-effect waves-primary"><i
                            class="mdi mdi-18px mdi-history"></i><span> Login History </span></a>
                </li>
                @endcan
            </ul>
        
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
