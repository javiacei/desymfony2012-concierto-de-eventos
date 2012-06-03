<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\EventListener;

use DeSymfony\UserBundle\Event\GetUserEvent;
use DeSymfony\UserBundle\Event\UserEvents;
use Guzzle\Http\Client;

class UserListener
{
    public function onPreUserSave(GetUserEvent $event)
    {
        $user = $event->getUser();

        $client = new Client('https://github.com/api/v2/json/');

        $request = $client->get('user/email/' . $user->getEmail());

        try {
            $response = $request->send();
        } catch (\Exception $e) {
            $user->setMetadata(
                array ( 'github' => 'Sin comprobar')
            );
            return;
        }

        $user->setMetadata(
            array( 'github' => \json_decode($response->getBody(), true)
            )
        );
    }
}
