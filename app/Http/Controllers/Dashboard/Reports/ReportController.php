<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\IntakeCategory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function campus($view)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Colleges&Schools']);

        $inst = Institution::with('campuses')->get();

        $data['institution'] = $inst;
        $data['view'] = $view;

        return view('dashboard.reports.campus', $data);

    }

    public function intakeCategory($view, $campus_id)
    {
        $data['bc'] = array(['link' => route('dashboard'), 'page' => 'Dashboard'], ['link' => '#', 'page' => 'Intakes']);
        $intakes = IntakeCategory::all();
        $data['intakes'] = $intakes;

        $data['view'] = $view;
        $data['campus_id'] = $campus_id;
        return view('dashboard.reports.intakes', $data);

    }
    public function moduleReport(Request $request){

    }
}
