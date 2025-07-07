<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class CourseAssessmentImport implements ToCollection,WithCalculatedFormulas,WithHeadingRow
{
    use  Importable;

    protected $course_id;
    public function __construct($course_id)
    {
        HeadingRowFormatter::extend('custom', function($value) {
            $values =explode('/',$value);
            return "" . Str::slug($values[0]);
        });
        $this->course_id=$course_id;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        dd($rows);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
