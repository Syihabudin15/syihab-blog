<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = ["id"];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
