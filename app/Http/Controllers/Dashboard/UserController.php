<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Lib\Srs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Models\Permission;
use App\Models\LoginHistory;
use Validator;
use Image;
use File;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{


    public function __construct()
    {


    }

    public function index1(Request $request)
    {
        if (! Gate::allows('users-view')) {
            return abort(401);
        }


        $data = User::orderBy('id', 'DESC')->paginate(5);
        $bc = array(array('link' => '#', 'page' => trans('app.dashboard')));

        return view('dashboard.users.index', compact('datWa','bc'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function index()
    {
        if (! Gate::allows('users-view')) {
            return abort(401);
        }

      //  dd(Auth::user()->getRoleNames());
        $data['bc'] = array(['link' => route('dashboard'), 'page' => trans('app.dashboard')],['link' => '#', 'page' => trans('app.users')]);
        return view('dashboard.users.index',$data);
    }

    public function getUsers()
    {
        if (! Gate::allows('users-view')) {
            return abort(401);
        }

        $users = User::query();

        return DataTables::of($users)
            ->addColumn('role', function ($user) {

                $html = "";
                if (!empty($user->roles())) {

                    foreach ($user->roles as $v) {

                        $html .= "<span class='badge bg-primary'>"
                            . $v->name .
                            "</span>";

                    }
                    return $html;

                }


            })
            ->addColumn('action', function ($users) {
                $delete_link="";
                if (Gate::allows('users-delete')) {
                    $delete_link = "<a  href='#' class='po ' title='<b>Delete user " . $users->name . "</b>' data-content=\"<p>"
                    . trans('app.r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . route('users.destroy', [$users->id]) . "'>"
                    . trans('app.i_m_sure') . "</a> <button class='btn po-close'>" . ('no') . "</button>\"  rel='popover'><i class=\"fa fa-1x fa-trash-o red\"></i> "
                    . ('') . "</a>";
                }
               
                if (Gate::allows('users-edit')) {
                    return ' <a href="' . route('users.edit', $users->id) . '" class="btnx btn-xsx btn-primaryx"><i class="fa fa-1x fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="edit user"></i> </a>
                ' . $delete_link;
                }
               

            })->escapeColumns(['roles'])
            ->make(true);
    }


     public function userloginhistory()
     {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => trans('app.dashboard')],['link' => '#', 'page' => trans('app.users')]);

         $id = Auth::user()->id;

         $data['login'] = LoginHistory::where('user_id',$id)->get();

         return view('dashboard.users.loginhistory',$data);

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users-create')) {
            return abort(401);
        }

        $roles = Role::pluck('name', 'name')->all();
        $bc = array(array('link' => '#', 'page' => trans('app.dashboard')));

        return view('dashboard.users.create', compact('roles','bc'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('users-create')) {
            return abort(401);
        }

        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);
        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('users-view')) {
            return abort(401);
        }

        $user = User::find($id);
        $bc = array(['link' => route('dashboard'), 'page' => trans('app.dashboard')],['link' => '#', 'page' => trans('products.products')]);

        return view('dashboard.users.show', compact('user'));
    }

    public function profile($id = NULL)
    {
        if (! Gate::allows('users-profile-manage')) {
            return abort(401);
        }

        $bc = array(['link' => route('dashboard'), 'page' => trans('app.dashboard')],['link' => '#', 'page' => trans('app.profile')]);
         if ($id==NULL){
             $id=Auth::id();
         }
        // dd($username);
        $current_user = User::find(Auth::id());
        $user = User::where('id','=',$id)->first();
        if(!$user){
            Session::flash('warning', trans('app.access_denied'));
            return back();
        }



       //dd($id != Auth::user()->id);
        if ($id == Auth::user()->id || $current_user->hasRole('SuperAdmin')) {
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();


            return view('dashboard.users.profile', compact('user', 'roles', 'userRole','bc'));

        }
        Session::flash('warning', trans('app.access_denied'));
        return Redirect::back();
        // dd(!$user->hasRole('SuperAdmin'));
        //$user = User::find($id);


    }

    public function profileUpdate(Request $request, $id)
    {
        if (! Gate::allows('users-profile-manage')) {
            return abort(401);
        }

        $this->validate($request, [
           // 'username' => 'required|unique:users,username,' . $id,
            'first_name' => 'required',
            'middle_name'=>'required',
            'last_name' => 'required',
            'gender'   =>'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'password' => 'required|same:confirm-password',

        ]);
        $input = $request->all();
        $this->user->find($id);
        $this->user->update($input, $id);

        Session::flash('message', 'User updated successfully');
        return redirect()->back()->withInput(['tab'=>'edit']);

    }

    public function changePassword(Request $request, $id)
    {
        if (! Gate::allows('users-password-manage')) {
            return abort(401);
        }

        $user = $this->user->find($id);

        if (!(Hash::check($request->get('current-password'), $user->password))) {
            Session::flash('error', 'Your current password does not matches with the password you provided. Please try again.');
            // The passwords matches
            return redirect()->back()->withInput(['tab'=>'cpassword']);
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            Session::flash('error', 'New Password cannot be same as your current password. Please choose a different password.');
            //Current password and new password are same
            return redirect()->back()->withInput(['tab'=>'cpassword']);
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password-confirm',
        ]);

        //Change Password

        $user->password = ($request->get('new-password'));
        $user->save();
        Session::flash('message', 'Successfully updated');
        return redirect()->back()->withInput(['tab'=>'cpassword']);
    }

    public function passwordUpdate(Request $request, $id)
    {
        if (! Gate::allows('users-password-manage')) {
            return abort(401);
        }

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|same:new_password_confirm',

        ]);

        $input = $request->all();
        $user = $this->user->find($id);
        if (!Hash::check($input['old_password'], $user->password)) {
            Session::flash('error', 'The specified password does not match the database password');
            return back()
                ->with('error', 'The specified password does not match the database password');
        } else {


            $user->$user->update($input, $id);
            Session::flash('message', 'Sucessifully Updated');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('users-edit')) {
            return abort(401);
        }

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        // dd($roles);
        $userRole = $user->roles->pluck('name', 'name')->all();
        $bc = array(array('link' => '#', 'page' => trans('app.dashboard')));


        return view('dashboard.users.edit', compact('user', 'roles', 'userRole','bc'));
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
        if (! Gate::allows('users-edit')) {
            return abort(401);
        }

        //$user=$this->user();
         $this->validate($request, [
             //'username'=>'required|unique:users,username,'.$user->id,
             'first_name' => 'required',
             'last_name' => 'required',
            // 'password' => 'required|same:confirm-password',
             //'email' => 'required|email|unique:users,email,'.$id,

             'roles' => 'required'
         ]);

       // $validate = $request->validated();

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }


        $user = User::find($id);
        $user->update($input);
        foreach ($user->roles as $role) {
            $user->retract($role);
        }
        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function updateAvatar(Request $request,$id=NULL)
    {
        if (! Gate::allows('users-avatar-manage')) {
            return abort(401);
        }


     $validator =Validator::make($request->all(),[
          'avatar'=>'required'
     ]);
        if ($validator->fails()) {
            Session::flash('error','The Avatar Field Required');
            return back()->withInput(['tab' => 'avatar']);
        }
        if ($id==NULL) {
            $id = Auth::user()->id;
        }

        $input=$request->all();
        //$input['avatar'] = $request->input('avatar');
        $avatar = $request->file('avatar');
        $current_avatar=$this->user->getCurrentUserAvatarImage($id);

        $input['avatar'] = time() . '_'  . 'gtech.' . $avatar->getClientOriginalExtension();

        $destinationPath = public_path('/assets/uploads/avatars');
        $img = Image::make($avatar->getRealPath());

        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['avatar']);
        $file = public_path('assets/uploads/avatars') . '/' . $current_avatar;

        if (file_exists($file)) {
            File::delete($file);
        }


        $this->user->update($input,$id);
        Session::flash('message', 'Succesifuly updated');
        return back()->withInput(['tab' => 'avatar']);
    }

    public function destroy($id)
    {
        if (! Gate::allows('users-delete')) {
            return abort(401);
        }

        User::find($id)->delete();
        echo 'Deleted successfully';
        /*return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    */

    }
    public function checkUsername($slug){

        $slug = strtolower($slug);

        // is the slug in the banned words list
        //
        if(array_search($slug, array('pages','ajax','auth','organiser','dashboard','campaign','admin','password','contact'))){
            return array('status' => 'nok', 'message' => 'This slug is on a list of reserved names');
        }

        $user = User::where('username','=',$slug)->first();

        if($user){
            return back()->with('error','Not Allowed!!');

        }else{
            return true;
        }

    }
}