<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
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
    }

    /**
     * Evalua si un usuario esta autenticado 
     * 
     */
    static public function checkAuthenticated()
    {
        return Auth::check();
    }

    /**
     * Devuelve el rol del usuario autenticado
     */

    static public function getRole(): string
    {
        return Auth::user()->role->name ?? "guest";
    }
}
