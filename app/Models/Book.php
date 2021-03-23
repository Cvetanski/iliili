<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Book extends Model
{
    protected $table = 'books';

    protected $fillable =[
        'title',
        'slug',
        'short_description',
        'category_id',
//        'file',
        'photo',
        'origin_id',
        'year',
        'translator',
        'section_id',
        'quantity',
        'price',
        'publication_status',
        'author_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','id', 'category_id');
    }

    public function getBookBySlug($slug){
        return Book::with(['category_id'])->where('slug', $slug)->first();
    }

    public static function getAllBook()
    {
        return Book::with(['category_id'])->orderBy('id','desc')->paginate(10);
    }

}
