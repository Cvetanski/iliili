<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'title',
        'description',
        'publication_status',
        'section_id',
        'file'
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function getTitle():string
    {
        return $this->getAttribute('title');
    }

    public function setTitle(string  $title)
    {
        $this->setAttribute($title, 'title');
    }

    public function getDescription():string
    {
        return $this->getAttribute('description');
    }

    public function setDescription(string $description)
    {
        $this->setAttribute($description , 'description');
    }

    public function setPublicationStatus(string $publicationStatus)
    {
        $this->setAttribute($publicationStatus, 'publication_status');
    }

    public function getPublicationStatus():string
    {
        return $this->getAttribute('publication_status');
    }



}
