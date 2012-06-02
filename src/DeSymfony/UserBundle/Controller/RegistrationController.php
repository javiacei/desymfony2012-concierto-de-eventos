<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/registro")
 */
class RegistrationController extends Controller
{
    /**
     * @Route("/", name="registration_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }


    /**
     * @Template()
     */
    public function listUsersAction()
    {
        $users = $this->get('de_symfony_user.user_manager')->findAllUsers();

        return array(
            'users' => $users
        );
    }

    /**
     * @Route("/guardar", name="registration_save")
     * @Method("POST")
     */
    public function registerUserAction()
    {
        $email = $this->getRequest()->get('email');

        $userManager = $this->get('de_symfony_user.user_manager');

        $user = $userManager->createUser($email);

        $this->get('session')->setFlash('info', "Usuario {$user->getEmail()} registrado correctamente");
        return $this->redirect($this->generateUrl('registration_index'));
    }
}
