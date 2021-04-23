<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return redirect()->route($request->user()->role);
    }

    public function bookDetail($slug)
    {
        $product_detail= Book::getBookBySlug($slug);
        // dd($product_detail);
        return view('frontend.product_detail')->with('product_detail',$product_detail);
    }
}
