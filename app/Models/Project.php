<?php

// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Don;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function dons()
    {
        return $this->hasMany(Don::class);
    }
}
