<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function create(array $postData, $file, $userId)
    {
        DB::transaction(function ()  use ($postData, $file, $userId) {

            $slug = self::generateSlug($postData['title']);
            $post = Post::create(array_merge($postData, ['user_id' => $userId, 'slug' => $slug]));
            if ($file) {
                self::storeImage($post, $file['poster']);
            }
        });
    }

    public function update(Post $post, array $postData, $file)
    {
        return DB::transaction(function ()  use ($post, $postData, $file) {
            tap($post)->update($postData);
            if ($file) {
                Storage::delete('public/'.$post->poster);
                self::storeImage($post, $file['poster']);
            }
        });
    }

    private static function storeImage($post, $file)
    {
        $folderName = "post/{$post->id}";
        Storage::disk('public')->makeDirectory($folderName);
        if (isset($file)) {
            $fileName = $post->slug.'.'.$file->getClientOriginalExtension();
            $imagePath = $file->storeAs($folderName, $fileName, 'public');
            $post->poster = $imagePath;
            $post->save();
        }
    }

    private static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $existingSlug = Post::where('slug', $slug)->first();
        $counter = 1;
        while ($existingSlug) {
            $slug = Str::slug($title) . '-' . $counter;
            $existingSlug = Post::where('slug', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
