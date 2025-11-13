<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    
    public function index() {
        $blogs = Blog::all();
        return view('admin.blog_index', compact('blogs'));
    }
    public function create() {
        return view('admin.create_post');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'writer' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'passage' => 'required|string|min:50', // Added string type and minimum length
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validates actual image
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }

        Blog::create($validated);
        return redirect()->route('blogs.index')->with('success', 'post added successfully');
    }
    public function show(Blog $blog) {
        return view('admin.view_post', compact('blog'));
    }
    public function edit(Blog $blog) {
        return view('admin.edit_post', compact('blog'));
    }
    public function update(Request $request, Blog $blog) {
        $validated = $request->validate([
            'writer' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'passage' => 'required|string|min:50', // Added string type and minimum length
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validates actual image
        ]);

        // Handle image upload
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('posts', 'public');
        //     $validated['image'] = $imagePath;
        // }
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        }

        $blog->update($validated);
        return redirect()->route('blogs.index')->with('success', 'post updated successfully');
    }
    public function destroy(Blog $blog) {
        if($blog){
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', 'post deleted successfully');
        }
    }
}
