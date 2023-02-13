<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Relationship To User
    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }

    public $timestamps = false;
}