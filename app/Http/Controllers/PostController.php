<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\PostStatus;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    public function __construct(
        private PostService $postService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::where('user_id', Auth::user()->id)->get();
        return view('post.index')->with(['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $statuses = PostStatus::all();
        $category = PostCategory::where('user_id', $user->id)->get();
        return view('post.create')->with(['statuses' => $statuses, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, User $user)
    {
        $this->postService->create($request->validated(), $request->file(), $user->id);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('edit', [Post::class, $post]);
        $user = Auth::user();
        $statuses = PostStatus::all();
        $category = PostCategory::where('user_id', $user->id)->get();
        return view('post.edit')->with(['post' => $post, 'statuses' => $statuses, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $user = Auth::user();
        $this->authorize('update', [Post::class, $post]);
        $newPost =$this->postService->update($post, $request->validated(), $request->file());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', [Post::class, $post]);
        $post->delete();
        return redirect()->route('post.index');
    }
}
