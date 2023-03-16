<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
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

        //
        $this->registerPolicies();

        Gate::define('view-admin-dashboard', function (User $user) {
            return $user->role === 'Admin';
        });
    
        Gate::define('view-user-dashboard', function (User $user) {
            return $user->role === 'Masyarakat';
        });

        Gate::define('view-petugas-dashboard', function (User $user) {
            return $user->role === 'Petugas';
        });
    }
}
