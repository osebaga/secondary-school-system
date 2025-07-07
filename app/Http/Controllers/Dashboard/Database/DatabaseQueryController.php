<?php

namespace App\Http\Controllers\Dashboard\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Exeception;
class DatabaseQueryController extends Controller
{
    public function databaseQuery(Request $request){
        $validator = Validator::make($request->all(),[
           'sql'=>'required',
        ]);
        $data['bc'] = [['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Database Query']];
        $data['result']=null;
         
       if($request->input('sql')) {
           $sql = $request->sql;
           $result = DB::select("$sql");
           $data['result'] = $result;
       }
         
         
                      

        return view('dashboard.database.database',$data);

    }
}
