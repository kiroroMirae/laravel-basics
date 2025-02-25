<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'poster',
        'title',
        'desc',
        'author',
        'user_id',
        'category_id',
        'status_id',
    ];

    public function category() {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment() {
        return $this->hasMany(PostComment::class, 'post_id', 'id');
    }

    public function status() {
        return $this->belongsTo(PostStatus::class, 'status_id', 'id');
    }
}
