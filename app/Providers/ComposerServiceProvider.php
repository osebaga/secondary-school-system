<?php

namespace App\Providers;

use App\Http\Composers\GlobalComposer;
use View;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
        // This class binds the $logged_in_user variable to every view
            'dashboard/*', GlobalComposer::class
        );
        View::composer(
        // This class binds the $logged_in_user variable to every view
            'students/*', GlobalComposer::class
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
