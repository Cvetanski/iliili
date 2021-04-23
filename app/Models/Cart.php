<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable =[
        'price',
        'quantity',
        'amount',
        'book_id',
        'order_id',
        'user_id'
    ];


    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
