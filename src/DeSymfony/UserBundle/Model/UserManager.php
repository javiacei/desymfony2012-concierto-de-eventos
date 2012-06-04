<?php

namespace DeSymfony\UserBundle\Model;

use DeSymfony\UserBundle\Entity\User;
use DeSymfony\UserBundle\Event\GetUserEvent;
use DeSymfony\UserBundle\Event\UserEvents;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * UserManager Model
 */
class UserManager
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function createUser($email)
    {
        $user = new User();
        $user->setEmail($email);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    public function findAllUsers()
    {
        return $this->em->getRepository('DeSymfonyUserBundle:User')->findAll();
    }
}

