<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories, 'PageTitle' => 'Categories']);
    }

    public function show(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $posts = $category->posts; // Assuming you have a posts relationship defined in Category model
        // dd()
        return view('categories.show', ['category'=> $category, 'PageTitle' => $category->title, 'posts' => $posts]);
    }
}
