<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// Asa
    public function pages() {
        return $this->hasMany('App\Models\Page');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    // helper method for checking admin or editor
    public function isAdminOrEditor() {
        return $this->hasAnyRole(['admin', 'editor']);
    }

    public function hasAnyRole($roles) {
        return null != $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role) {
        return null != $this->role()->where('name', $role)->first();
    }

}
