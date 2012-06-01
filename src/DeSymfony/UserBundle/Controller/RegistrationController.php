<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/registro")
 */
class RegistrationController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }


    /**
     * @Template()
     */
    public function listRandomUsersAction()
    {
        $users = array('javi', 'eduardo', 'nacho', 'moi');

        return array(
            'users' => $users
        );
    }
}
