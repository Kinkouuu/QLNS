<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     */
    public function boot(): void
    {   
        $this->registerPolicies();
        Gate::define('create-department', function ($user) {
            return $user->role;
        });
        Gate::define('update-department', function ($user) {
            return $user->role;
        });
        Gate::define('create-user', function ($user) {
            return $user->role;
        });
        Gate::define('update-user', function ($user) {
            return $user->role;
        });
        Gate::define('reset-user', function ($user) {
            return $user->role;
        });
        Gate::define('delete-user', function ($user) {
            return $user->role;
        });
    }
}
