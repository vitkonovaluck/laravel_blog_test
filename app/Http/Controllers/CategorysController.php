<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategorysController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);;
        return view('post.index', [
            'posts' => $posts,
            'category' => 'Всі'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('post.index', [
            'posts' => Post::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(10),
            'category' => $category->title,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:1|max:100',
        ]);

        return view('post.index', [
            'posts' => Post::where('title', 'LIKE', '%' . $request->search . '%')->orderBy(
                'created_at',
                'desc'
            )->paginate(10),
            'category' => 'Пошук',
        ]);
    }

}
