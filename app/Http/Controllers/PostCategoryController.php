<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Services\PostCategoryService;
use App\Http\Requests\PostCategeryRequest;
use App\Http\Requests\StorePostCategoryRequest;
use Illuminate\Support\Facades\Auth;

class PostCategoryController extends Controller

{

    public function __construct(
        private PostCategoryService $postCategoryService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategory = PostCategory::where('user_id', Auth::user()->id)->get();
        return view('category.index')->with(['postCategory' => $postCategory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostCategoryRequest $request, User $user)
    {
        $this->postCategoryService->create($request->validated(), $user->id);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        $this->authorize('edit', [PostCategory::class, $postCategory]);
        return view('category.edit')->with(['postCategory' => $postCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostCategoryRequest $request, PostCategory $postCategory)
    {
        $this->authorize('update', [PostCategory::class, $postCategory]);
        $newPostCategory = $this->postCategoryService->update($postCategory, $request->validated());
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        $this->authorize('delete', [PostCategory::class, $postCategory]);
        $postCategory->delete();
        return redirect()->route('category.index');
    }
}
