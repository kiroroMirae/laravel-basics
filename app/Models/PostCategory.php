<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function post() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
