<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function alummniRegister($regNo)
    {
        $alumnus = User::where('username', $regNo)->first();

        $program = Student::where('reg_no', $regNo)->first();

        if ($alumnus) {
            return response()->json(
                [
                    'registration_number' => $regNo,
                    'first_name' => $alumnus->first_name,
                    'middle_name' => $alumnus->middle_name,
                    'last_name' => $alumnus->last_name,
                    'gender' => $alumnus->gender,
                    'program' => $program->program->program_name,
                ],
                200,
            );
        } else {
            return response()->json(
                [
                    'message' => 'Registration Number Does Not Exist',
                ],
                422,
            );
        }
    }

    public function getCourses(){
        $response = [
            'courses' => Course::pluck('course_name')
        ];

        try{
            if($response){
                return response()->json($response, 200);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => 'error'
            ], 422);
        }
        
    }
}
