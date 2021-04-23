<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('admin.all_order')->with('orders',$orders);
    }

    public function delete(int $id)
    {
        $order = Order::findOrFail($id);

        $order->delete();
    }

}
