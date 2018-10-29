<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Participant;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {            
        view()->composer('*', function ($view){
            $view->with('countAllMembers', Participant::count());
            $view->with('countVisibleMembers', Participant::where('show','0')->count());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
