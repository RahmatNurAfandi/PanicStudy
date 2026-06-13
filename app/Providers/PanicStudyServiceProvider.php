<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\PlannerServiceInterface;
use App\Services\PlannerService;

class PanicStudyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PlannerServiceInterface::class,
            PlannerService::class
        );
    }

    public function boot(): void
    {
        //
    }
}
