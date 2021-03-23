<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('admin.add_delivery');
    }

    public function create()
    {
        return view('admin.add_delivery');
    }

    public function store(Request $request)
    {
        $delivery = new Delivery($request->all());

        $delivery->save();

        return redirect('all-delivery')->with('message','Успешно додадовте град за достава!');
    }

    public function allDelivery()
    {
        $deliveries = Delivery::all();

        return view('admin.all_delivery',['deliveries'=>$deliveries]);
    }

    public function edit(int  $id)
    {
        $delivery =Delivery::findOrFail($id);

        return view('admin.edit_delivery')->with('delivery',$delivery);
    }

    public function update(Request $request, $id)
    {
        $delivery=Delivery::findOrFail($id);
        $data= $request->all();
//        dd($data);
        $delivery->fill($data)->save();

        return redirect()->route('all-delivery')->with('message','Успешно го ажуриравте градот за испорака!');
    }

    public function delete(int $id)
    {
        $delivery = Delivery::find($id);

        $delivery->delete();

        return redirect('all-delivery')->with('message','Успешно го избришавте градот од вашата достава!');
    }
}
