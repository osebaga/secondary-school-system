<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\UnpaidStudent;
use App\Helpers\SRS;
use App\Models\ExamCategoryResult;
 
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Validators\Failure;
use Carbon\Carbon;
use Throwable;

class BlockedstudentImport implements ToCollection,WithCalculatedFormulas,WithHeadingRow
{
    use  Importable;
    /**
    * @param Collection $collection
    */
protected $intake_id;
protected $year_id;
protected $semester;
protected $rejected;
protected $rejected_string = "";

public function __construct($year_id,$semester,$intake_id)
{
//dd($course);
   // HeadingRowFormatter::default('none');
    HeadingRowFormatter::extend('custom', function($value) {
          $values =explode('/',$value);

          return "" . Str::slug($values[0]);
    });
    $this->intake_id = $intake_id;
    $this->year_id=$year_id;
    $this->semester=$semester;
    $this->rejected = new Collection();
    $this->rejected_string = "";
}


    public function collection(Collection $rows)
    {
        //

        foreach ($rows as $row) {


           // dd($rows);
          $reg_no = $row['reg-number'];
          $reason = $row['reason'];

           $insertdate = [
            
             'year_id' => $this->year_id,
             'semester_id' => $this->semester,
             'intake_id' => $this->intake_id,
             'reg_no' => $reg_no,
             'blocked_by' => Auth::id(),
             'blocked_date' => Carbon::now(),
             'status' => 0,
             'reason' => $reason
           ];

           UnpaidStudent::updateOrCreate($insertdate);

        }
    }
}
