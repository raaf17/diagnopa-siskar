<?php

namespace App\Models;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

    public function posts(){
        return $this->hasMany(Posts::class);
    }
}
