<?php

namespace DeSymfony\UserBundle\Model;

use DeSymfony\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;

/**
 * UserManager Model
 */
class UserManager
{
    /**
     * em
     *
     * @var Doctrine\ORM\EntityManager
     */
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