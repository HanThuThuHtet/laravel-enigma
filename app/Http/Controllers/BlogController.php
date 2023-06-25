<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blogs.index',[
            'blogs' => Blog::latest()
                    ->filter(request(['category','username','search']))
                    ->paginate(6)
                    ->withQueryString()
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }
}
