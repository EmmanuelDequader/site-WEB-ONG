<?php


// app/Models/Content.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'type', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}