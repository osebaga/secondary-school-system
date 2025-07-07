<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class AdminRecoverPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      User::where('id',1)->update([
              'password' =>   Hash::make('12345678')
      ]);
         
      
    }
}
