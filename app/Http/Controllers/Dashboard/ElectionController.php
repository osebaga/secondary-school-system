<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicYear;
use App\Models\ElectionPost;
use App\Models\ElectionCandidate;
use App\Models\Student;
use App\Models\user;
use App\Models\Campus;
use App\Models\ElectionVote;
use Validator;
use DB;
use Carbon\Carbon;
class ElectionController extends Controller
{
    public function electionpost()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']);
        $data['ayear'] = AcademicYear::all();
        $data['electionpost'] = ElectionPost::all();
        $data['postcandidate'] = Electioncandidate::all();
        $data['votes'] =   ElectionVote::
                       select('candidate_id', DB::raw('count(*) as total'))
                      ->groupBy('candidate_id')
                      ->get();
        return view('dashboard.registrar.election.index',$data);
    }
    public function addelectionpost()
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']);

        $data['ayear'] = AcademicYear::all();
        
        return view('dashboard.registrar.election.modals.modal_add_post', $data)->render();
    }

    public function postelectionpost(Request $request)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']);

        $data['ayear'] = AcademicYear::all();

        $validator = Validator::make($request->all(),[
            'post'=>'required',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        ElectionPost::create($request->except(['_token']));

        return redirect()->back()->with('message', 'Election Post added successfully');
        
        return view('dashboard.registrar.election.modals.modal_add_post',$data);
    }

  
     public function addelectioncandidate()
     {


        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']);

        $data['ayear'] = AcademicYear::all();
        $data['post']  = ElectionPost::all();
        $data['campus'] = Campus::all();
        
        $data['candidate'] =   Student::join('users','users.id','=','students.user_id')->get();
        
        return view('dashboard.registrar.election.modals.modal_add_candidate',$data)->render();
        


     }

     public function postelectioncandiate(Request $request)
     {
         $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student Profile ']);
 
         $data['ayear'] = AcademicYear::all();
 
         $validator = Validator::make($request->all(),[
             'post_id'=>'required',
             'name' =>'required',
         ]);
         if ($validator->fails()) {
             return back()->with('errors', $validator->errors());
         }
         ElectionCandidate::create($request->except(['_token']));
 
         return redirect()->back()->with('message', 'Election candidate added successfully');
         
         return view('dashboard.registrar.election.modals.modal_add_post',$data);
     }


     public function deleteelectioncandiate(Request $request)
     {

        ElectionCandidate::where('id',$request->id)->delete();
 
        return redirect()->back()->with('message', 'Election candidate delete successfully');

     }

     public function election()
     {
        $date = Carbon::now()->format('Y-m-d');
        $data['ayear'] = AcademicYear::all();
        $data['post']  =  ElectionPost::
                          whereDate('enddate','>=',$date)->get();
        $data['postcandidate'] = Electioncandidate::all();
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Student ']);
        return view('dashboard.registrar.election.studentelection',$data);
     }


     public function myformAjax(Request $request)
     {

          $id = $request->id;
          $year = $request->year;
       // dd($year);
         
         $cities = ElectionCandidate::
                     where("post_id",$id)->where('period',$year)
                     ->pluck("name","id");
         return json_encode($cities);
         
     }

     public function voting(Request $request)
     {

         
        $input = $request->all();

        $validator = Validator::make($input, [
            'candidate' => 'required',
            'post' => 'required',
            'period' => 'required',

        ]);
        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $post = [
            'candidate_id' => $request->candidate,
            'reg_no'  => $request->reg_no,
            'post'    => $request->post,
            'status' => 1,
            'period'  => $request->period
   
        ];

        
       $checkvoted = ElectionVote::where('reg_no',$request->reg_no)
                                  ->where('candidate_id',$request->candidate)
                                  ->where('period',$request->period)->get();

       
        if($checkvoted->isEmpty())
         {
            ElectionVote::create($post);

            return redirect()->back()->with('message', 'Election candidate voted successfully');
   
         }else {
 
            return redirect()->back()->with('status', 'You are not allowed to vote multiple times');

         }

      

      
        
        
        //return $post;
         //
        

     }
 
}
