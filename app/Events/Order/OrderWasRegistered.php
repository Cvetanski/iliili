<?php

namespace App\Events\Order;

use App\Models\Order;

class OrderWasRegistered
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getUser(): Order
    {
        return $this->order;
    }
}
