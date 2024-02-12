<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enumeration\UserRoles;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Blade::if('admin', fn() => auth()->user()->isAdminOrSuper());
        Blade::if('super', fn() => auth()->user()->isSuper());
    }
}
