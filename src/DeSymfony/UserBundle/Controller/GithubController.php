<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("github/api/v2/json")
 */
class GithubController extends Controller
{
    /**
     * @Route("/user/email/{email}", name="github_user_by_email")
     */
    public function userByEmailAction($email)
    {
        if ('fco.javier.aceituno@gmail.com' == $email) {
            $githubData = \json_encode(array(
                'user' => array(
                    'login' => 'javiacei',
                    'public_repo_count' => 16
                )
            ));

            return new Response($githubData, 200, array(
                'Content-Type' => 'application/json'
            ));
        }

        $githubData = \json_encode(array());
        return new Response($githubData, 404, array(
            'Content-Type' => 'application/json'
        ));
    }
}
