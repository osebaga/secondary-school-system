<?php

namespace App\Http\Controllers;

use App\Exports\HostelsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HostelController extends Controller
{
    public function export(){
        return Excel::download(new HostelsExport, 'hostels.xlsx');
    }
}
