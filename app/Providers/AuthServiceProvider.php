<?php

namespace App\Providers;

// Asa
use App\Models\Page;
use App\Policies\PagePolicy;
use App\Models\User;
use App\Policies\ManageUserPolicy;

use App\Models\Post;
use App\Policies\PostPolicy;
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
        // 'App\Model'=>'App\Policies\ModelPolicy',
        // 'App\Page'=>'App\Policies\PagePolicy',
        // 'App\User'=>'App\Policies\ManageUsersPolicy',
        // 'App\Post'=>'App\Policies\PostPolicy',


        // 'App\Models\Page' => 'App\Policies\PagePolicy',
        // 'App\Models\User' => 'App\Policies\ManageUserPolicy',

        Page::class => PagePolicy::class,
        User::class => ManageUserPolicy::class,
        Post::class =>PostPolicy::class,
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
