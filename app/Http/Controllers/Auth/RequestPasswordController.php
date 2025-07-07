<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendPassword;
use Mail;
use Hash;
class RequestPasswordController extends Controller
{
    //


    public function resetpassword()
    {
        return view('auth.passwords.requestpassword');
    }

      public function sendpassword(Request $request)
      {
      
         $email = $request->email;
         $checkifregistered = User::where('email',$email)->get();
         //return $checkifregistered;
         if($checkifregistered->isEmpty())
         {
            return back()->with('status','We have no records for this user '. $email);
         }else{
               
            $password = mt_rand(100000, 999999);
            $updatepassword = User::where('email',$email)->update(['password'=>Hash::make($password)]);
            $body = array(
                'name' =>$checkifregistered->first()->first_name. ' '.$checkifregistered->first()->last_name,
                'password' =>$password
                
            );

            Mail::to($email)->send(new SendPassword($body));

            return back()->route('login')->with('status','Mail send successfully to  '. $email);


         }

        // dd($email);

      }
}
