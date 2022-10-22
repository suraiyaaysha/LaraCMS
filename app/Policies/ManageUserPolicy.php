<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManageUserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // Asa
    public function manageUsers(User $user) {
        return $user->hasRole('admin');
        // return $user->hasRole == 'admin';
        // return $user->role == 'admin';
    }
}
