<?php


namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        return view('admin.add_author');
    }




}
