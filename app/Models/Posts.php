<?php

namespace App\Models;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function author(){
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
