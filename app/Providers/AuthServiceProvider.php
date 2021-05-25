<?php

namespace App\Providers;



use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Charity;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });
        Gate::define('charity', function (User $user) {
            return $user->role === 'charity';
        });
        Gate::define('ch_access',function(User $user,Charity $charity){
           return ($user->role === 'admin'|| $user->id === $charity->user_id);
        });
        Gate::define('volunteer', function (User $user) {
            return $user->role === 'volunteer';
        });
        Gate::define('benef', function (User $user) {
            return $user->role === 'benef';
        });
    }
}
