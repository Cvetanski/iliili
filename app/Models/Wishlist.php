<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table ='wishlist';

    protected $fillable = [
        'user_id',
        'book_id',
        'cart_id',
        'price',
        'amount',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Book::class,'product_id');
    }
}
