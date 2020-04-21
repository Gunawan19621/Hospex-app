<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GetEventServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once base_path('app/Helpers/GetEvent.php');
    }
}
