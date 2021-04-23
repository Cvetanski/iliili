<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded ='web';


    public function getId(): int
    {
        return (int)$this->getAttribute('id');
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $name)
    {
        $this->setAttribute('name' ,$name);
    }

    public function getSurname():string
    {
        return $this->getAttribute('surname');
    }

    public function setSurname(string $surname)
    {
        $this->setAttribute('surname', $surname);
    }

    public function getEmail():string
    {
        return $this->getAttribute('email');
    }

    public function setEmail(string $email)
    {
        $this->setAttribute($email, 'email');
    }

}
