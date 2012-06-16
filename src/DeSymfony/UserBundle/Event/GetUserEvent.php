<?php

namespace DeSymfony\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use DeSymfony\UserBundle\Entity\User;

/**
 * GetUserEvent
 *
 */
class GetUserEvent extends Event
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
