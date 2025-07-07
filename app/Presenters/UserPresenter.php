<?php
/**
 * Created by PhpStorm.
 * User: DOTO OSEBAGA
 * Date: 10/23/2018
 * Time: 10:20 PM
 */

namespace App\Presenters;


use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function name(){
       // return sprintf("%s %s", $this->entity->first_name, $this->entity->last_name);
        return sprintf("%s", $this->entity->name);
    }
    public function userName(){
        return $this->entity->username;
    }
    public function avatar(){
        return ($this->entity->avatar && $this->entity->avatar != 'logo.png')  ? url($this->entity->avatar):url('assets/uploads/avatars/default/profile.jpg');

    }
    public  function ipAddress(){

    }
    public function last_login(){

    }
}
