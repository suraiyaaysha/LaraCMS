<?php

namespace App\Providers;

// Asa
use App\Models\Page;
use App\Policies\PagePolicy;
use App\Models\User;
use App\Policies\ManageUserPolicy;
// Asa

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Page' => 'App\Policies\PagePolicy',
        // 'App\Models\User' => 'App\Policies\ManageUserPolicy',

        Page::class => PagePolicy::class,
        User::class => ManageUserPolicy::class,
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
}
