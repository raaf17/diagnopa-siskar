<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Users extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'user';
}
