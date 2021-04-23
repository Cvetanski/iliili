<?php


namespace App\Http\Controllers\Cart;

use App\Cart_model;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{

    protected $book = null;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }


    public function addToCart(Request $request)
    {
////         dd($request->all());
//        if (empty($request->slug)) {
//            request()->session()->flash('error', 'Invalid Products');
//            return back();
//        }
//        $book = Book::where('slug', $request->slug)->first();
//        // return $product;
//        if (empty($book)) {
//            request()->session()->flash('error', 'Invalid Products');
//            return back();
//        }
//
//        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',)->where('book_id', $book->id)->first();
//        // return $already_cart;
//        if ($already_cart) {
////             dd($already_cart);
//            $already_cart->quantity = $already_cart->quantity + 1;
//            $already_cart->amount = $book->price + $already_cart->amount;
//            // return $already_cart->quantity;
//            if ($already_cart->book->quantity < $already_cart->quantity || $already_cart->book->quantity <= 0)
//                return back()->with('error', 'Stock not sufficient!.');
//
//        } else {
//
//            $cart = new Cart;
//            $cart->user_id = auth()->user()->id;
//            $cart->book_id = $book->id;
//            $cart->price = ($book->price + 130);
//            $cart->quantity = 1;
//            $cart->amount = $cart->price * $cart->quantity;
//            if ($cart->book->quantity < $cart->quantity || $cart->book->quantity <= 0) return back()->with('error', 'Stock not sufficient!.');
//            $cart->save();
////            $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id', null)->update(['cart_id' => $cart->id]);
//        }
//        request()->session()->flash('success', 'Product successfully added to cart');
//        return back();



        $book = Book::where('slug', $request->get('slug', ''))->first();
        if (!$book) {
            request()->session()->flash('error', 'Invalid Products');
            return back();
        }

        $cart = null;
        $user = auth()->user();

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->where('order_id', null)->where('book_id', $book->id)->first();
        }

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user ? $user->id : null;
        }

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('book_id', $book->id)->first();
        // return $already_cart;
        if ($already_cart) {
            $already_cart->quantity = $already_cart->quantity + 1;
            $already_cart->amount = $book->price + $already_cart->amount;
            // return $already_cart->quantity;
            if ($already_cart->book->quantity < $already_cart->quantity || $already_cart->book->quantity <= 0) return back()->with('error', 'Stock not sufficient!.');
            $already_cart->save();

        } else {

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->book_id = $book->id;
            $cart->price = ($book->price + 130);
            $cart->quantity = 1;
            $cart->amount = $cart->price * $cart->quantity;

            $cart->save();
//            $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id', null)->update(['cart_id' => $cart->id]);
        }
        request()->session()->flash('success', 'Product successfully added to cart');
        return back();
    }



    public function singleAddToCart(Request $request)
    {
//        $request->validate([
//            'slug'      =>  'required',
//            'quantity'      =>  'required',
//        ]);
//        // dd($request->quant[1]);
//
//
//        $book = Book::where('slug', $request->slug)->first();
//        if($book->quantity <$request->quantity[1]){
//            return back()->with('error','Out of stock, You can add other products.');
//        }
//        if ( ($request->quantity[1] < 1) || empty($book) ) {
//            request()->session()->flash('error','Invalid Products');
//            return back();
//        }
//
//        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('book_id', $book->id)->first();
//
//        // return $already_cart;
//
//        if($already_cart) {
//            $already_cart->quantity = $already_cart->quantity + $request->quantity[1];
//            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
//            $already_cart->amount = ($book->price * $request->quantity[1])+ $already_cart->amount;
//
//            if ($already_cart->book->quantity < $already_cart->quantity || $already_cart->book->quantity <= 0) return back()->with('error','Stock not sufficient!.');
//
//            $already_cart->save();
//
//        }else{
//
//            $cart = new Cart;
//            $cart->user_id = auth()->user()->id;
//            $cart->book_id = $book->id;
//            $cart->price = ($book->price + 130);
//            $cart->quantity = $request->quantity[1];
//            $cart->amount=($book->price * $request->quantity[1]);
//            if ($cart->book->quantity < $cart->quantity || $cart->book->quantity <= 0) return back()->with('error','Stock not sufficient!.');
//            // return $cart;
//            $cart->save();
//        }
//        request()->session()->flash('success','Product successfully added to cart.');
//        return back();
    }

    public function delete($id = null)
    {
        $delete_item = Cart::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message', 'Deleted Success!');
    }

    public function updateQuantity($id, $quantity)
    {
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size = DB::table('cart')->select('product_code', 'size', 'quantity')->where('id', $id)->first();
        $stockAvailable = DB::table('product_att')->select('stock')->where(['sku' => $sku_size->product_code,
            'size' => $sku_size->size])->first();
        $updated_quantity = $sku_size->quantity + $quantity;
        if ($stockAvailable->stock >= $updated_quantity) {
            DB::table('cart')->where('id', $id)->increment('quantity', $quantity);
            return back()->with('message', 'Update Quantity already');
        } else {
            return back()->with('message', 'Stock is not Available!');
        }
    }

    public function checkout(Request $request)
    {
        return view ('frontend.checkout');
    }
}
