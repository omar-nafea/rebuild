<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;


class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index', ['PageTitle' => 'Home']);
    }

    public function createCategory()
    {
        Category::create([
            'title' => 'CS',
        ]);
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function showCategories()
    {
        return view('posts.categories' , ['PageTitle' => 'Categories']);

    }
}
