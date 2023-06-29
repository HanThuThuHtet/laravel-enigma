<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index',[
            "blogs" => Blog::latest()->paginate(7)
        ]);
    }

    public function  create()
    {
        return view('blogs.create',[
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $path = request()->file('thumbnail')->store('thumbnails');
        $formData = request()->validate([
            'title' => "required",
            'slug' => "required|unique:blogs,slug",
            'intro' => "required",
            'body' => "required",
            "category_id" => "required|exists:categories,id",
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = $path;
        Blog::create($formData);

        return redirect('/');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',[
            "blog" => $blog,
            "categories" => Category::all()
        ]);
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back();
    }


}
