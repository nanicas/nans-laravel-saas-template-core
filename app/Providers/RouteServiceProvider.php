<?php

namespace Zevitagem\LaravelSaasTemplateCore\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace($this->namespace)
                ->group(base_path('routes/template_web.php'));
    }
}
