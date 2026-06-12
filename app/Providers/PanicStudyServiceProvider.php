<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PlannerService;
use App\Services\ReminderService;
use App\Services\ProgressService;
use App\Services\DashboardService;

class PanicStudyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            PlannerService::class,
            fn () => new PlannerService()
        );

        $this->app->singleton(
            ReminderService::class,
            fn () => new ReminderService()
        );

        $this->app->singleton(
            ProgressService::class,
            fn () => new ProgressService()
        );

        $this->app->singleton(
            DashboardService::class,
            fn () => new DashboardService()
        );
    }

    public function boot(): void
    {
        //
    }
}
