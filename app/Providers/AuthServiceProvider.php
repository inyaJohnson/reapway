<?php

namespace App\Providers;

use App\Referral;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-actions', function ($user){
           return $user->hasAnyRole(['admin', 'super-admin']);
        });

        Gate::define('super-admin', function($user){
            return $user->hasRole('super-admin');
        });

        Gate::define('client-actions', function ($user){
           return $user->hasRole('user');
        });

        Gate::define('referral_actions', function($user){
            $referred_user = Referral::where('referred_id', $user->id )->first();
            return null == $referred_user;
        });

        Gate::define('block_user', function ($user){
           return 0 == $user->blocked;
        });

        Gate::define('activation', function ($user){
            return 1 == $user->activation;
        });
    }
}
