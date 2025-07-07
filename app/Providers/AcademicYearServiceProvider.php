<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AcademicYear; // Adjust the namespace as needed

class AcademicYearServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share academic years with all views
        view()->composer('*', function ($view) {
            $academic_years = AcademicYear::pluck('year', 'id'); // Adjust according to your model
            $view->with('academic_years', $academic_years);
        });
    }

    public function register()
    {
        //
    }
}