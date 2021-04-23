<?php

namespace App\Events\User;

use App\Models\User;

class UserWasRegistered
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }

}
