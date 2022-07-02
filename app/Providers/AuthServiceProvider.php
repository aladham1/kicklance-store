<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::before(function ($user, $ability) {
//            if ($user->id == 9) {
//                return true;
//            }
//        });
//
//        Gate::define('categories.view', function ($user) {
////            if ($user->type == "super-admin"){
////                return true;
////            }
//
//            return true;
//        });
//
//        Gate::define('categories.create', function ($user) {
//            if ($user->type == "super-admin") {
//                return true;
//            }
//        });
//
//        Gate::define('categories.update', function ($user) {
//            if ($user->type == "super-admin") {
//                return true;
//            }
//        });
    }
}
