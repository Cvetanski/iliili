<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model
{
    protected $table ='coupon_user';

    protected $fillable = [
        'is_used',
        'code_id',
        'user_id'
    ];
}
