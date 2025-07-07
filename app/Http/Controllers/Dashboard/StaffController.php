<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\Common\Repository;
use App\Models\AcademicYear;
use App\Models\Building;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\Position;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use App\Traits\CheckCampusTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use Validator;
use Image;
use File;
use SRS;

class StaffController extends Controller
{
    use CheckCampusTrait;
    protected $user_model, $student_model;

    function __construct()
    {
        //parent::__construct();
        $this->user_model = new Repository(new User());
        $this->student_model = new  Repository(new Student());
        
    }

    public function index($faculty_id)
    {
        if (! Gate::allows('staffs-view')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Staffs']);

        $data['filter_by'] = [
            '' => '',
            'surname' => 'Surname',
            'first_name' => 'First Name'
        ];
        $departments[''] = '';
        $departments['All'] = 'All Departments';
        $deps = Department::all();
        foreach ($deps as $dep) {
            $departments[$dep->id] = $dep->department_name;
        }
        $data['departments'] = $departments;
        $data['faculty_id']=$faculty_id;
        return view('dashboard.staffs.index', $data);

    }
    public function campuses()
    {
        if (! Gate::allows('staffs-view')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Campuses']];
       
        if ($this->checkCampusAndRoles(Auth::user()->staff->campus_id)) {
            
            $campuses = Institution::with(['campuses'])->get();

        }else {
            $campuses = Institution::whereHas('campuses', function ($q) {
                $q->checkCampus();
            })->with(['faculties'])->get();

        }
    //    dd($campuses);
        $data['campuses'] = $campuses;

        return view('dashboard.staffs.index_schools', $data);
    }
    public function getJsonStaffs($campus_id)
    {
        if (! Gate::allows('staffs-view')) {
            return abort(401);
        }

        try {
            $campus_id=SRS::decode($campus_id)[0];
        }catch (\Exception $e){
            abort(404);
        }
        $staffs = Staff::where('campus_id',$campus_id)->with(['user', 'department']);
        
        return DataTables::of($staffs)
            ->addIndexColumn()
            ->addColumn('full_name', function ($staff) {
                $staf = 'N/A';
                $staf2 = 'N/A';
                if(!empty($staff->user->first_name))
                {
                $staf = $staff->user->first_name;
                $staf2 = $staff->user->middle_name ;
                return $staf. ' '.$staf2;
                }
                return  $staf. ' '.$staf2;
               
            })->addColumn('staff_gender', function ($staff) {
                $gender = 'N/A';
                if(!empty($staff->user->gender))
                {
                $gender = $staff->user->gender;
                return $gender;
                }
                return  $gender;
               
            })
            ->addColumn('role', function ($staff) {
                $html = "";
                if (!empty($staff->user->roles)) {

                    foreach ($staff->user->roles as $v) {

                        $html .= "<span class='badge bg-primary m-1'>"
                            . $v->name .
                            "</span>";

                    }
                    return $html;
                }

            })
            ->addColumn('action', function ($staff) {
                $edit_link="";
                $delete_link="";
                if (Gate::allows('staffs-edit')) {
                    $edit_link = link_to(route('staffs.edit', SRS::encode($staff->user->id ?? "")), '<i class="fa fa-edit p-1" aria-hidden="true"></i>');
                }
               if (Gate::allows('staffs-delete')) {
                $delete_link = "<a href='#' class='po' title='<b>" . ("Delete Staff") . "</b>' data-content=\"<p>"
                . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('staffs.destroy', SRS::encode($staff->user->id ?? "")) . "'>"
                . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . trans('app.no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o red p-1\"></i> "
                . "</a>";
               }
                $profile_link = link_to(route('staffs.edit', SRS::encode($staff->user->id ?? "")), '<i class="fa fa-user-circle-o  p-1" aria-hidden="true"></i>');
                $assign_course_link =''; //link_to(route('courses.staff-assign-course'), '<i class="fa fa-plus-circle p-2" aria-hidden="true"></i>Assign Course');

                return html_entity_decode($assign_course_link) . html_entity_decode($edit_link) . html_entity_decode($delete_link);
            })
            ->escapeColumns(['roles'])
            ->make(true);
    }

    public function create()
    {
        if (! Gate::allows('staffs-create')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Register Staff']);
        $data['roles'] = Role::pluck('name', 'name')->all();
        //$positions['']='';
        $pos = Position::all();
        $builds = Building::all();
        $buildings[''] = '';
        $campuses[''] = '';
        foreach (Campus::all() as $b) {
            $campuses[$b->id] = $b->campus_name;
        }
        foreach ($builds as $b) {
            $buildings[$b->id] = $b->building_name;
        }
        $positions[''] = '';
        foreach ($pos as $p) {
            $positions[$p->id] = $p->position_name;
        }
        $data['salutations'] = [
            '' => '',
            'Mr' => 'Mr',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
            'Prof' => 'Prof',
        ];
        $data['gender'] = [
            '' => '',
            'M' => 'Male',
            'F' => 'Female'
        ];
        $departments[''] = '';
        //$deps = $this->department_model->all();
        $deps = DB::table('departments as d')->join('faculties as f','d.faculty_id','=','f.id')
                ->select(['d.*','d.id as did','f.*'])->get();
        //dd($deps);
        foreach ($deps as $dep) {
            $departments[$dep->did] = $dep->department_name.' ('.$dep->faculty_acronym.' )';
        }
        $data['departments'] = $departments;
        $data['positions'] = $positions;
        $data['buildings'] = $buildings;
        $data['campuses'] = $campuses;
        return view('dashboard.staffs.create', $data);
    }

    public function edit($id)
    {
        if (! Gate::allows('staffs-edit')) {
            return abort(401);
        }
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Edit Staff']);
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }

      //  $user = $this->user_model->findWhere('id', $id)->with('staff')->first();
        $user = User::find($id);//->with('staff');
        // $staff=$this->staff_model->findWhere('id',$id)->with('user')->first();
        //dd($id,$user,$user->staff);ode
        $data['roles'] = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        // dd($userRole);
        $pos = Position::all();
        $builds = Building::all();
        $buildings[''] = '';
        $campuses[''] = '';
        foreach (Campus::all() as $b) {
            $campuses[$b->id] = $b->campus_name;
        }
        foreach ($builds as $b) {
            $buildings[$b->id] = $b->building_name;
        }
        $positions[''] = '';
        foreach ($pos as $p) {
            $positions[$p->id] = $p->position_name;
        }
        $data['salutations'] = [
            '' => '',
            'Mr' => 'Mr',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
            'Prof' => 'Prof',
        ];
        $data['gender'] = [
            '' => '',
            'M' => 'Male',
            'F' => 'Female'
        ];
        $departments[''] = '';
       // $deps = $this->department_model->all();
        $deps = DB::table('departments as d')->join('faculties as f','d.faculty_id','=','f.id')
            ->select(['d.*','d.id as did','f.*'])->get();
        //dd($deps);
        foreach ($deps as $dep) {
            $departments[$dep->did] = $dep->department_name.' ('.$dep->faculty_acronym.' )';
        }
        $data['campuses'] = $campuses;
        $data['departments'] = $departments;
        $data['positions'] = $positions;
        $data['buildings'] = $buildings;
        $data['user'] = $user;
        $data['staffRoles'] = $userRole;

        return view('dashboard.staffs.edit', $data);

    }

    public function store(Request $request)
    {
        if (! Gate::allows('staffs-create')) {
            return abort(401);
        }
        $input = $request->all();
        $validator = Validator($input, [
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }


        $input['password'] = Hash::make($input['password']);

        $user_data = [
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $input['password'],
            'status' => '1',
            'type' => '1',
            'gender' => $input['gender'],
        ];

        DB::beginTransaction();
        try {
            $user = User::create($user_data);
            $staff_data = [
                'user_id' => $user->id,
                'year_id' => Auth::user()->staff->year_id,
                'salutation' => $input['salutation'],
                'department_id' => $input['department_id'],
                'building_id' => $input['building_id'],
                'office_room_number' => $input['office_room_number'],
                'position_id' => $input['position_id'],
                'mobile_number' => $input['mobile_number'],
                'office_phone_number' => $input['office_room_number'],
                'email_address' => $input['email'],
                'campus_id'     =>$input['campus_id'],
            ];
            $staff = Staff::create($staff_data);
            foreach ($request->input('roles') as $role) {
                $user->assign($role);
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }

        return redirect()->back()->with('message', 'Staff created successfully');
    }

    public function update(Request $request, $id)
    {
        if (! Gate::allows('staffs-edit')) {
            return abort(401);
        }
        $input = $request->all();
        //dd($input);
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
       // $user = $this->user_model->findWhere('id', $id)->with('staff')->first();
        $user = User::find($id);
        //$staff=$this->staff_model->getModel()->find($id)->with('user')->first();
        // dd($staff,$staff->user);

        $validator = Validator::make($input, [
            'username' => 'required|unique:users,username,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,

            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('errors', $validator->errors());
        }


        if (!empty($input['password'])) {
            $validator = Validator::make($input, [
                'password' => 'required|same:confirm-password',
            ]);
            if ($validator->fails()) {
                return back()->withInput()->with('errors', $validator->errors());
            }

            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user_data = [
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],

            'username' => $input['username'],
            'email' => $input['email'],

            'status' => '1',
            'type' => '1',
            'gender' => $input['gender'],

        ];
        if (!empty($input['password'])) {
            $user_data['password'] = $input['password'];
        }

        DB::beginTransaction();
        try {
            //dd($user_data);
            $user->update($user_data);
            //dd($s);

            $staff_data = [
                'year_id' => Auth::user()->staff->year_id,
                'salutation' => $input['salutation'],
                'department_id' => $input['department_id'],
                'building_id' => $input['building_id'],
                'office_room_number' => $input['office_room_number'],
                'position_id' => $input['position_id'],
                'mobile_number' => $input['mobile_number'],
                'office_phone_number' => $input['office_room_number'],
                'email_address' => $input['email'],
                'campus_id'     =>$input['campus_id'],
            ];
            $user->staff->update($staff_data);
            //dd($request->input('roles') );
            foreach ($user->roles as $role) {
                $user->retract($role);
            }
            foreach ($request->input('roles') as $role) {
                $user->assign($role);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Something Went Wrong! code(' . $e->getMessage() . ')');
        }

        return redirect()->back()
            ->with('message', 'Staff updated successfully');

    }

    public function changeAcademicYear()
    {
        if (! Gate::allows('staffs-change_year')) {
            return abort(401);
        }
        $ac_years = AcademicYear::all();
        $acyear = AcademicYear::active()->first();
        // dd($ac_years,$acyear);
        $academic_years[''] = '';
        foreach ($ac_years as $ac_year) {
            $academic_years[$ac_year->id] = $ac_year->year;
        }

        $data['academic_years'] = $academic_years;
        $data['acyear'] = $acyear;


        $data['bc'] = $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'],['link' => '#', 'page' => 'Settings > Change AYear']);

        return view('dashboard.staffs.change_year', $data);

    }

    public function changeAcademicYearUpdate(Request $request, $staff_id)
    {
        if (! Gate::allows('staffs-change_year')) {
            return abort(401);
        }
        try {
            $staff_id = SRS::decode($staff_id)[0];
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong=' . $e->getMessage());
        }
        $input = $request->all();
        try {
//            Staff::find($staff_id)->update($input);
            //$active_year = AcademicYear::active();
          //  AcademicYear::where('status','1')->update(['status'=>'0']);
          // AcademicYear::where('id',$input['year_id'])->update(['status'=>'1']);
          $request->all();

            // $update = DB::table('staffs')->where('user_id', $staff_id)->limit(1)->update(['year_id' => $input['year_id']]);
            // new approach
            $user_staff=Staff::where('user_id',$staff_id)->first()->update($input);

            //            dd($user_staff);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong=' . $e->getMessage());

        }
        return back()->with('message', 'User Year Changed Successfully');

    }

    public function destroy($id)
    {
        if (! Gate::allows('staffs-delete')) {
            return abort(401);
        }
        try {
            $id = SRS::decode($id)[0];
            // Staff::where('user')->destroy($id);
            User::destroy($id);
        } catch (\Exception $e) {
            return response()->json(['Something Went Wrong! code(' . $e->getMessage() . ')']);

        }
        return response()->json(['Staff Deleted Successfully']);


    }

    public function profile($user_id=null)
    {
        
        if (! Gate::allows('staffs-profile-manage')) {
            return abort(401);
        }
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Staff Profile']];
       if (!is_null($user_id)&&Auth::user()->hasRole('SuperAdmin') || !is_null($user_id)&&Auth::user()->hasRole('Admin')){
           try{
            $id=SRS::decode($user_id)[0];
           }catch (\Exception $e){
            abort(404);
           }
       }else{
           $id = Auth::id();
       }

       $user_staff=Staff::where('user_id',$id)->first();
       
       if (!$user_staff){
           abort(404);
       }

        $counts = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];
        $countries = array();
        foreach ($counts as $c) {
            $countries[$c] = $c;
        }
        $data['salutations'] = [
            '' => '',
            'Mr' => 'Mr',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
            'Prof' => 'Prof',
        ];
        //  dd($countries);
        $user = User::find($id)->whereHas('staff', function ($q) {
            $q->academicYear();
        })
            ->with(['staff' => function ($q) {
                $q->academicYear();
            }])->first();

        $user = Staff::where('user_id', '=', $id)
            ->academicYear()
            ->with('user')
            ->with('courses')->first();
        // dd($user);
        $data['staff'] = $user;

        $data['countries'] = $countries;

        return view('dashboard.staffs.profile', $data);
    }

    public function updateProfile(Request $request, $id)
    {
        if (! Gate::allows('staffs-profile-manage')) {
            return abort(401);
        }
        // $request->except('_method');
        $input = $request->all();
        //dd($input);
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        //$user = $this->user_model->findWhere('id', $id)->with('staff')->first();
        $user = User::find($id);
        $validator = Validator::make($input, [
            'username' => 'required|unique:users,username,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,


        ]);


        if ($validator->fails()) {
            return back()->withInput(['tab' => 'edit'])->with('errors', $validator->errors());

        }

        if ($validator->fails()) {
            return back()->withInput(['tab' => 'edit'])->with('errors', $validator->errors());

        }
        $user_data = [
            'username'=>$input['username'],
            'first_name'=>$input['first_name'],
            'last_name'=>$input['last_name'],
            'middle_name'=>$input['middle_name'],
            'gender' => $input['gender'],

        ];

        //dd($s);

        $staff_data = [
            'salutation' => $input['salutation'],
            'mobile_number' => $input['mobile_number'],
        ];


        //dd($student_data,$user_data);
        DB::beginTransaction();
        try {

            $user->update($user_data);
            $user->staff->update($staff_data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput(['tab' => 'edit'])->with('error', 'Update Failed ' . $e->getMessage());

        }

        // Session::flash('message', '');
        return redirect()->back()->withInput(['tab' => 'edit'])->with('message', 'User updated successfully');

    }

    public function changePassword(Request $request, $id)
    {     
        /*
        if (! Gate::allows('staffs-password-manage')) {
            return abort(401);
        }
        */
        $input = $request->all();
        try {
            $id = SRS::decode($id)[0];
        } catch (\Exception $e) {
            abort(404);
        }
        //$user = $this->user_model->find($id);
        $user = User::find($id);


        if (!(Hash::check($request->get('current-password'), $user->password))) {
            //Session::flash('error', '.');
            // The passwords matches
            return redirect()->back()->withInput(['tab' => 'cpassword'])->with('error', 'Your current password does not matches with the password you provided. Please try again');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Session::flash('error', '.');
            //Current password and new password are same
            return redirect()->back()->withInput(['tab' => 'cpassword'])->with('error', 'New Password cannot be same as your current password. Please choose a different password');
        }

        $validator = Validator::make($input, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password-confirm',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput(['tab' => 'cpassword'])->with('errors', $validator->errors());

        }

        //Change Password

        $user->password =Hash::make($request->get('new-password'));
        $user->save();
        //Session::flash('message', '');
        return redirect()->back()->withInput(['tab' => 'cpassword'])->with('message', 'Successfully updated');
    }

    public function updateAvatar(Request $request, $id = null)
    {
        if (! Gate::allows('staffs-profile-manage')) {
            return abort(401);
        }
        $validator = Validator::make($request->all(), [
            'avatar' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'The Avatar Field Required');
            return back()->withInput(['tab' => 'avatar']);
        }
        if (!is_null($id)) {
            try {
                $id = SRS::decode($id)[0];
            } catch (\Exception $e) {
                abort(404);
            }
        }else{
            $id = Auth::user()->id;
           }

           $user= User::find($id);
           //dd($user->avatar);
           $input=$request->all();
           //$input['avatar'] = $request->input('avatar');
           $avatar = $request->file('avatar');
           $current_avatar=$user->avatar;
   
           $avatar_name = time() . '_'  . 'QK_'.$user->id .'.'.$avatar->getClientOriginalExtension();
           $input['avatar'] = asset('assets/uploads/avatars/'.$avatar_name);
           $destinationPath = public_path('assets/uploads/avatars');
           $img = Image::make($avatar->getRealPath());
   
           $img->resize(150, 150, function ($constraint) {
               $constraint->aspectRatio();
           })->save($destinationPath . '/' . $avatar_name);
           $file = $current_avatar;
           //dd($file);
   
           if (file_exists($file)) {
               //dd($file);
               File::delete($file);
           }
           $user->update($input);
           Session::flash('message', 'Succesifuly updated');
        return back()->withInput(['tab' => 'avatar']);
    }

}
