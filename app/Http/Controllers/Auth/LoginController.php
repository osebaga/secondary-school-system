<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::UNKNOWN_ROUTE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /* protected function validateLogin(Request $request)
     {
         $this->validate(
             $request,
             [
                 'username' => 'required|string',
                 'password' => 'required|string',
             ],
             [
                 'username.required' => 'Username or email is required',
                 'password.required' => 'Password is required',
             ]
         );
     }*/
    /*protected function sendFailedLoginResponse(Request $request)
    /*protected function sendFailedLoginResponse(Request $request)
     {
         $request->session()->put('errors', trans('auth.failed'));
         throw ValidationException::withMessages(
             [
                 'error' => [trans('auth.failed')],
             ]
         );
     }*/
    public function username()
    {
        $login=request()->input('login');
        $field=filter_var($login,FILTER_VALIDATE_EMAIL)? 'email':'username';
        request()->merge([$field =>$login]);
        return $field;
    }
    protected function authenticated(Request $request, $user)
    {
        //dd(Session::all());
        if($user->type==1){
            // event(new UserLoggedEvent($user));
//            $staff=User::where('users.id','=',Auth::id())
//                ->join('staffs','users.id','=','staffs.user_id')
//                ->join('departments','staffs.department_id','=','departments.id')
//                ->join('positions','staffs.position_id','=','positions.id')
//                ->join('faculties','departments.faculty_id','=','faculties.id')
//                ->select("users.id", "first_name" , "middle_name" , "last_name" , "username", "email", "status" , "avatar", "type",'staffs.id as staff_id', "salutation", "department_id", "building_id", "office_room_number", "position_id", "mobile_number", "office_phone_number", "email_address", "user_id", "department_name" , "faculty_id" , "position_name" , "college_id" , "faculty_name", "faculty_acronym"
//                )->first();
//            // $ac_yr=AcademicYear::where('status','=',1);
//            //$request->session()->put('staff',$staff);
//
//            Session::put('staff',$staff);
            $this->redirectTo=RouteServiceProvider::HOME;
        }else if($user->type==0){
            $this->redirectTo=RouteServiceProvider::STUDENT_HOME;
        }else{

        }
        return redirect()->intended($this->redirectPath());
    }

    public function resetpassword()
    {
        echo "user";
    }    
}
