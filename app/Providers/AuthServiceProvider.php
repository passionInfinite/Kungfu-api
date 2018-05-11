<?php

namespace KungFu\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use KungFu\AccessTokenHelper;
use KungFu\Guards\JWTGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'KungFu\Model' => 'KungFu\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('jwt', function ($app, $name, array $config) {
           return new JWTGuard(
               Auth::createUserProvider($config['provider']),
               $app->make(Request::class),
               $app->make(AccessTokenHelper::class)
           );
        });
    }
}
