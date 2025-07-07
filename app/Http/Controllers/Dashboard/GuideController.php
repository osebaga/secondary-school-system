<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    public function admin()
    {
       
        $data['bc'] = array(['link' => '', 'page' => 'guides'], ['link' => '#', 'page' => 'Administrator Guides']);
        if(Auth::user()->roles()->first()->name == "SuperAdmin")
       {
           return view('dashboard.guides.adminguide', $data);
       }
       
        elseif(Auth::user()->roles()->first()->name == "SystemAdmin"){
        return view('dashboard.guides.adminguide', $data);

       }

       elseif(Auth::user()->roles()->first()->name == "Registrar")
        {
            return view('dashboard.guides.registarguide', $data);
        }

        elseif(Auth::user()->roles()->first()->name == "ExamOfficer")
       { 
           return view('dashboard.guides.examofficerguide', $data);
        }

        elseif(Auth::user()->roles()->first()->name == "Lecturer")
       { 
           return view('dashboard.guides.lecturerguide', $data);
        }

        elseif(Auth::user()->roles()->first()->name == "Billing")
       { 
           return view('dashboard.guides.billingguide', $data);
       }
    }

    
}
