<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clean = $request->validate([
            "name" => "required|min:3|max:255"
        ]);
        $clean['slug'] = str($clean['name'])->slug();
        Category::create($clean);
        return [
            "msg" => "Created Successfully",
            // "category" =>  
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        // dd($category);
        $clean = $request->validate([
            "name" => "required|min:3|max:255"
        ]);
        $clean['slug'] = str($clean['name'])->slug();
        $category->update($clean);

        return [
            "msg" => "updated Successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return [
            "msg" => "Deleted Successfully"
        ];
    }
}
