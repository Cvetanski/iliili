<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table ='books';

    protected $fillable =[
        'id',
        'title',
        'short_description',
        'category_id',
        'file',
        'origin_id',
        'year',
        'translator',
        'section_id',
        'quantity',
        'price',
        'publication_status',
        'author_id'

    ];
}
