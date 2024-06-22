<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return $blogs;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id'=>'required',
            'category_id'=>'required'
        ]);
        $blog = Blog::create($validated);
        return $blog;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog =Blog::findOrFail($id);
        return $blog;
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
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id'=>'required',
            'category_id'=>'required'
        ]);
        $blog=Blog::findOrFail($id);
        $blog->update($validated);
        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);

        return response()->json([],204);
    }
}
