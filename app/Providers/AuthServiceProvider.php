<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Rend les tokens perrissables au bout de 30 jours
        //Passport::tokensExpireIn(now()->addDays(30));
        //Passport::refreshTokenExpireIn(now()->addDays(30));
        //Passport::personalAccessTokenExpireIn(now()->addDays(30));
    }
}
