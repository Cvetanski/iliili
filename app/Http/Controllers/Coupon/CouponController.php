<?php

namespace App\Http\Controllers\Coupon;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateCoupon;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUser;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('admin.add_coupon');
    }

    public function create()
    {
        return view('admin.add_coupon');
    }


//    $voucher->code = $this->generateRandomString(6);// it should be dynamic and unique

    public  function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(Request $request)
    {

//        $coupon = new Coupon($request->all());
//
//        $coupon->save();
//
//        return redirect('all-coupon')->with('message','Успешно го доделивте купонот!');

        $data = $request->all();
            $voucher = new Coupon();
            $voucher->code = $this->generateRandomString(6);// it should be dynamic and unique
            $voucher->type = $data['type'];
            $voucher->value  = $data['value'];
            $voucher->user_id = $data['user_id'];
            $voucher->save();

                return redirect('all-coupon')->with('message','Успешно го доделивте купонот!');
    }

    public function allCoupon()
    {
        $coupons = Coupon::all();

        return view('admin.all_coupon',['coupons'=>$coupons]);
    }

    public function edit(int $id)
    {
        $coupon=Coupon::findOrFail($id);

        return view('admin.edit_coupon')->with('coupon',$coupon);
    }

    public function update(Request $request, $id)
    {
        $coupon=Coupon::findOrFail($id);
        $data= $request->all();

//        dd($data);

        $coupon->fill($data)->save();

        return redirect()->route('all-coupon')->with('message','Успешно го ажуриравте купонот!');
    }

    public function delete(int $id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();

        return redirect('all-coupon')->with('message','Успешно го избришавте купонот!');
    }
}
