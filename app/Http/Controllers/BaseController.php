<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Repositories\Common\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public  $academic_year_id;
    protected $ac_year_model;
    function __construct()
    {
        dd(auth()->user());

        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            if (Auth::user()->type==1){
                $this->academic_year_id=Auth::user()->staff->year_id;
            }elseif (Auth::user()->type==2){
                $this->academic_year_id=Auth::user()->student->year_id;
            }
            return $next($request);
        });


//        $this->ac_year_model=new Repository(new AcademicYear());
//        $academic_year=$this->ac_year_model->findWhere('status','1')->first();
//         if ($academic_year->count()>0){
//             $this->academic_year_id=$academic_year->id;
//
//         }else{
//             dd('no');
//         }
    }
    public function x(){
        dd(Auth::user());
    }
}
