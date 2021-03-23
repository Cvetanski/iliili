<?php


namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Book;

class ProductController extends Controller
{
    public function index($id)
    {
        $detail_product=Book::findOrFail($id);
        $imagesGalleries=Image::where('products_id',$id)->get();
        $totalStock=Book::where('products_id',$id)->sum('stock');
        $relateProducts=Book::where([['id','!=',$id],['categories_id',$detail_product->categories_id]])->get();
        return view('frontend.product_details',compact('detail_product','imagesGalleries','totalStock','relateProducts'));
    }
}
