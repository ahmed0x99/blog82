<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts;
     return view("Dashboard.posts.index" , compact("posts"));
        // dd($id);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.posts.create");
        // dd("FG");
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $clean = $request->validate([
            "title" => "required|string|max:255",
            // "slug" => "required|string|max:255|unique:posts,slug",
            "body" => "required|string",
            "cover_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048", // Validate image file
            "category_id" => "required|exists:categories,id"
        ]);

        $path = $request->file("cover_image")->store("x" , "public");
        $clean['cover_image'] = $path;
        $clean['slug'] = Str::slug($clean['title']) . "-" . time();
        $clean['user_id'] = Auth::user()->id;
        Post::create($clean);
        return redirect()->route("posts.index" , Auth::user()->id);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view("Dashboard.posts.show" , compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Post::findOrFail($id);
        return view("Dashboard.posts.edit" , compact("post"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $clean = $request->validate([
            "title" => "required|string|max:255",
            // "slug" => "required|string|max:255|unique:posts,slug,".$post->id,
            "body" => "required|string",
            "cover_image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048", // Validate image file
            "category_id" => "required|exists:categories,id"
        ]);

        if($request->hasFile("cover_image")){
            // Delete the old image if exists
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $path = $request->file("cover_image")->store("x" , "public");
            $clean['cover_image'] = $path;
        }

        $clean['slug'] = Str::slug($clean['title']) . "-" . time();
        $post->update($clean);
        return redirect()->route("posts.index" , Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete($post->cover_image);
        $post->delete();

        return redirect()->route("posts.index" , Auth::user()->id);
    }
}
