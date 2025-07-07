<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnpaidStudent;

class UnpaidStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnpaidStudent::create([
            'reg_no'=>"IAE/SEPT/001",
             'name'=> "osebga",
            'year_id'=>"2025/2021",
           'semester_id'=>"semester I",
           'blocked_by'=>2,
           'unblocked_by'=>"osebaga",   
           'status'=>0,
           'reason'=>"hujalipa ada"
    
           ]);
    }
}
