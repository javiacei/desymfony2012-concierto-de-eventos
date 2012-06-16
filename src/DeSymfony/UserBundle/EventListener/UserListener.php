<?php

namespace DeSymfony\UserBundle\EventListener;

use DeSymfony\UserBundle\Event\GetUserEvent;
use Guzzle\Http\Client;

/**
 * UserListener
 *
 */
class UserListener
{
    public function onPreUserSave(GetUserEvent $event)
    {
        $user = $event->getUser();

        $client = new Client('http://desymfony.localhost.com/app.php/github/api/v2/json/');

        $resource = "user/email/{$user->getEmail()}";
        $request = $client->get($resource);

        try {
            $response = $request->send();
        } catch (\Exception $e) {
            return;
        }

        $user->setMetadata(array(
            'github'    => \json_decode($response->getBody(), true)
        ));
    }
}
