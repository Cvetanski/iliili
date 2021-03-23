<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupons';

    protected $fillable = [
        'id',
        'code',
        'type',
        'value',
        'user_id'
    ];

//    public function user()
//    {
//        return $this->belongsToMany(
//            User::class,
//            'users',
//            'user_id',
//            ''
//        )->withTimestamps();
//    }



    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }

    public function getId(): int
    {
        return (int)$this->getAttribute('id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user()->get()->first();
    }

    public function setUser(User $user)
    {
        $this->user()->associate($user);
    }


}
