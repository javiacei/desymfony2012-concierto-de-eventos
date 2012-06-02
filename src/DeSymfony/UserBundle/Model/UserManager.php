<?php

namespace DeSymfony\UserBundle\Model;

use DeSymfony\UserBundle\Entity\User;
use DeSymfony\UserBundle\Event\GetUserEvent;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * UserManager Model
 */
class UserManager
{
    protected $em;

    protected $dispatcher;

    public function __construct(EntityManager $em, EventDispatcherInterface $dispatcher)
    {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function createUser($email)
    {
        $user = new User();
        $user->setEmail($email);

        $event = new GetUserEvent($user);
        $this->dispatcher->dispatch('desymfony.pre_user_save', $event);

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    public function findAllUsers()
    {
        return $this->em->getRepository('DeSymfonyUserBundle:User')->findAll();
    }
}
