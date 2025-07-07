<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $users= User::factory(2)->create();
        $users = User::all();

        foreach ($users as $user){
            if ($user->type==1) {
                $user->assign('SuperAdmin');
            }
            if ($user->type==0) {
                $user->assign('Student');
            }

        }
    }
}
