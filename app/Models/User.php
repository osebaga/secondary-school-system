<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable,HasRolesAndAbilities,PresentableTrait ,SoftDeletes;


    protected $presenter=UserPresenter::class;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'username',
        'password',
        'type',
    ];
    
    protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function staff(){
        return $this->hasOne(Staff::class);
    }
    public function student(){
        return $this->hasOne(Student::class);
    }
    public function student_class(){
        return $this->hasMany(StudentClass::class)->withTrashed();

    }
    /*public function getIdAttribute($value){
        return Hashids::encode($value);
    }*/
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function program(){
        return $this->hasOne(Program::class);
    }

    public function courseresult()
    {
        return $this->hasMany(courseResult::class,'reg_no');
    }

    public function unpaid()
    {
        return $this->hasMany(UnpaidStudent::class,'blocked_by');
    }

    public function unpaid2()
    {
        return $this->hasMany(UnpaidStudent::class,'unblocked_by');
    }

    public function getFullNameAttribute($value)
    {
        return ucfirst($this->first_name).' '.ucfirst($this->middle_name).' '.ucfirst($this->last_name);
    }
    public function studentClass(){
        return $this->hasOne(StudentClass::class,'username');  
    }
}

