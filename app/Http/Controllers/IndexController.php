<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class IndexController extends Controller
{
    //
    public function index()
    {
      $categories = Category::all();
      $posts = Post::latest()->paginate(5);
        return view('index', ['PageTitle' => 'Home', 'posts' => $posts ,'categories' => $categories]);
    }

    public function createCategory()
    {
        Category::create(attributes: [
            'title' => 'Programming',
        ]);
        Category::create(attributes: [
            'title' => 'Cyber Security',
        ]);
        Category::create(attributes: [
            'title' => 'Linux',
        ]);
        Category::create(attributes: [
            'title' => 'Computer Science',
        ]);
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function showCategories()
    {
        $categories = Category::all();
        Post::factory(5)->create();
        return view('posts.categories' , ['PageTitle' => 'Categories', 'categories' => $categories]);

    }
}
