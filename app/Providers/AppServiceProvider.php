<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting = Setting::find(1);
        if($setting != null) {
            $app_name = $setting->name;
        }
        else {
            $app_name = 'Laravel';
        }
        
        config(['app.name' => $app_name]);
    }
}
