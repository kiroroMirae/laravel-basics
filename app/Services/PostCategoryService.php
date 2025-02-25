<?php

namespace App\Services;

use App\Models\PostCategory;
use Illuminate\Support\Facades\DB;

class PostCategoryService
{
    public function create(array $categoryData, $userId)
    {
        DB::transaction(function ()  use ($categoryData, $userId) {
           PostCategory::create(array_merge($categoryData, ['user_id' => $userId]));
        });
    }

    public function update(PostCategory $postCategory, array $categoryData)
    {
        return DB::transaction(function ()  use ($postCategory, $categoryData) {
            return tap($postCategory)->update($categoryData);
        });
    }
}
