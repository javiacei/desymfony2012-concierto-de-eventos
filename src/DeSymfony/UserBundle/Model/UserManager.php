<?php

namespace DeSymfony\UserBundle\Model;

use DeSymfony\UserBundle\Entity\User;
use Doctrine\ORM\EntityManager;

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

        /* Queremos lanzar un evento antes de la guardar el usuario en la bbdd */

        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    public function findAllUsers()
    {
        return $this->em->getRepository('DeSymfonyUserBundle:User')->findAll();
    }
}
