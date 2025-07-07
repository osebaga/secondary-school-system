<?php

namespace Database\Seeders;
use App\Models\ExamScore;
use Illuminate\Database\Seeder;

class ExamScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamScore::create([

            'reg_no'=>"BPCH/SEP/001",
            'year_id'=>2025,
            'semester_id'=>1,
            'course_id'=>'PST04101',
            'exam_category_id'=>1,
            'uploadedby'=>12,
            'assignment1'=>4,
            'assignment2'=>4,
            'test1'=>12,
            'test2'=>14


        ]);
    }
}
