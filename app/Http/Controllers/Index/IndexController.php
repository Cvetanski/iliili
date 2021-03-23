<?php


namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Book;

class IndexController extends  Controller
{
    public function index()
    {
        $books=Book::all();
        return view('frontend.index',compact('books'));
    }
}
