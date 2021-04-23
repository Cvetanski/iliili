<?php


namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends  Controller
{
    public function index()
    {
        $books=Book::all();
        return view('frontend.index',compact('books'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }
    public function BookDetail($id){
        $bookDetail=Book::findOrFail($id);
        $imagesGalleries=Book::where('photo',$id)->get();

        return view('frontend.index',compact('bookDetail','imagesGalleries'));
    }

    public function shop()
    {
        $books=Book::query();

        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Book::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $books->whereIn('category_id',$categoryId);
            // return $products;
        }
//        if(!empty($_GET['brand'])){
//            $slugs=explode(',',$_GET['brand']);
//            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
//            return $brand_ids;
//            $products->whereIn('brand_id',$brand_ids);
//        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $books=$books->where('publication_status',1)->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $books=$books->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

            $books->whereBetween('price',$price);
        }

        // Sort by number
        if(!empty($_GET['show'])){
            $products=$books->where('publication_status','active')->paginate($_GET['show']);
        }
        else{
            $products=$books->where('publication_status','active')->paginate(9);
        }

        return view('frontend.shop')->with('books',$books)->with('recent_products',$recent_products);
    }

    public function productFilter(Request $request)
    {
        $data= $request->all();
        // return $data;
        $showURL="";
        if(!empty($data['show'])){
            $showURL .='&show='.$data['show'];
        }

        $sortByURL='';
        if(!empty($data['sortBy'])){
            $sortByURL .='&sortBy='.$data['sortBy'];
        }

        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $brandURL="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandURL)){
                    $brandURL .='&brand='.$brand;
                }
                else{
                    $brandURL .=','.$brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL="";
        if(!empty($data['price_range'])){
            $priceRangeURL .='&price='.$data['price_range'];
        }
        if(request()->is('e-shop.loc/product-grids')){
            return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
        }
        else{
            return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
        }
    }
}
