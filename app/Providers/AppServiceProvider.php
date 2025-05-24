<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
    public function boot(): void {
        Model::preventLazyLoading();
        // Paginator::useBootstrapFive();

        // Gate::define('edit_job', function (User $user, job $job) {
        //     return $job->employer->user->is($user); // return as boolean
        // });
    }
}
