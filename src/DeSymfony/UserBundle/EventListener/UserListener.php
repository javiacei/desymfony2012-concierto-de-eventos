<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\EventListener;

use DeSymfony\UserBundle\Event\GetUserEvent;
use Guzzle\Http\Client;

class UserListener
{
    public function onPreUserSave(GetUserEvent $event)
    {
        $user = $event->getUser();

        // github API v2
        $client = new Client('http://github.com/api/v2/json/');

        $request = $client->get('user/email/' . $user->getEmail());
        $response = $request->send();

        if (200 == $response->getStatusCode()) {
            $user->setMetadata(\json_decode($response->getBody(), true));
        }
    }
}
