<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    static function sendcontrolno($data)
    {

        $std_info = User::where('username', $data['std_reg_number'])->first();
        
        $mailData = [
            'title' => env('APP_NAME'),
            'std_name' => $std_info->first_name.' '. $std_info->last_name,
            'control_number' =>$data['reference_number'],
            'mobile' => $data['payer_mobile']
            ];
         
        Mail::to($data['payer_email'])->send(new NotifyMail($mailData));
           
        // dd("Email is sent successfully.");
    }
}
