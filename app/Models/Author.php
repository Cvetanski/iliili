<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $table ='authors';

    protected $fillable=[
        'name',
        'surname'
    ];

    public function getSurname():string
    {
        return $this->getAttribute('surname');
    }

    public function getName():string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $name)
    {
        $this->setAttribute('name',$name);
    }

    public function setSurname(string $surname)
    {
        $this->setAttribute('surname', $surname);
    }

    public static function getAllAuthor()
    {
        return Author::all()->get('name','surname');
    }

//    public function getById():int
//    {
//        return (int)$this->getAttribute('id');
//    }
}
