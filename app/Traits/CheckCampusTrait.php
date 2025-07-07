<?php


namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait CheckCampusTrait
{
    public function checkCampus($campus_id):bool {
       if ($campus_id===1){
           return true;
       }
       return false;
    }

   public function checkCampusAndRoles($campus_id,$roles=null):bool
   {
       if (is_null($roles)){
           $roles = "'SuperAdmin', 'Admin'";
        }
       if ($this->checkCampus($campus_id) && Auth::user()->isAll('SuperAdmin') || Auth::user()->isAll('SystemAdmin') ){
           return  true;
       }
       return false;
   }

}
