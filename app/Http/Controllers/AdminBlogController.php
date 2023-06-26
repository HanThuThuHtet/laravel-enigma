<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function  create()
    {
        return view('blogs.create',[
            'categories' => Category::all()
        ]);
    }
}
