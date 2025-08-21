<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Project;
use App\Models\Don;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'admin_id');
    }

    public function dons()
    {
        return $this->hasMany(Don::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin' || $this->role === 'super-admin';
    }

    public function isSuperAdmin()
    {
        return $this->role === 'super-admin';
    }
}
