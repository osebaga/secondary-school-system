<?php

namespace App\Exports;

use App\Models\Hostel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HostelsExport implements FromView,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): view
    {
        return view('dashboard.exports.hostels_report', [
            'index' => 1,
            'hostels' => Hostel::all()
        ]);
    }
}
