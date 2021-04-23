<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'address',
        'user_id',
        'delivery_id',
        'payment_method_id'
    ];

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id)
    {
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function delivery(){
        return $this->belongsTo(Delivery::class,'delivery_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
