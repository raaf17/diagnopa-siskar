<?php

namespace App\Models;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $table = 'posts';

    public function author(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
