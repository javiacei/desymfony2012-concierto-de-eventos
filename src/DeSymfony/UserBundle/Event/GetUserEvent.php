<?php

namespace DeSymfony\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use DeSymfony\UserBundle\Entity\User;

class GetUserEvent
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
