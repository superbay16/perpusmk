<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $books = Book::paginate($request->input('limit', 12));

        return view('pages.buku',[
            'categories' => $categories,
            'books' => $books
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $books = Book::where('categories_id', $category->id)->paginate($request->input('limit', 12));

        return view('pages.buku',[
            'categories' => $categories,
            'category' => $category,
            'books' => $books
        ]);
    }
}
