<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
     
        dd($id);
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
            "name" => "required|string|max:255",
            // "slug" => "required|string|max:255|unique:posts,slug",
            "body" => "required|string",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048", // Validate image file
            // "category_id" => "required|exists:categories,id"
        ]);

        if ($request->hasFile('image')) {
            
        }
        dd($clean);

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
