<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'category'
    ];

    public function book()
    {
        return  $this->hasMany('App\Models\Book','category_id','id');
    }

    public function getBooksByCategory($slug)
    {
        return Category::with('books')->where('slug', $slug)->first();
    }

    public function getCategory():string
    {
        return $this->getAttribute('category');
    }

    public function setCategory(string  $category)
    {
        $this->setAttribute($category, 'category');
    }

    public static function getAllParentWithChild()
    {
        return Category::with('child_cat')->where('is_parent',1)->where('status','active')->orderBy('title','ASC')->get();
    }

}
