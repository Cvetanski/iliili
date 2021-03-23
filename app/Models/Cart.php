<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable =[
        'products_id',
        'product_name',
        'product_code',
        'price',
        'quantity',
        'user_email',
        'session_id'
    ];
}
