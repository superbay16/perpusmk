<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::take(6)->get();
        $books = Book::with('galleries')->take(8)->get();

        return view('pages.home',[
            'categories' => $categories,
            'books' => $books
        ]);
    }
}
