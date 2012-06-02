<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle\EventListener;

use DeSymfony\UserBundle\Event\GetUserEvent;
use DeSymfony\UserBundle\Event\UserEvents;
use Guzzle\Http\Client;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserListener implements EventSubscriberInterface
{
    static public function getSubscribedEvents()
    {
        return array(
            UserEvents::PRE_USER_SAVE => array('onPreUserSave', 0)
        );
    }

    public function onPreUserSave(GetUserEvent $event)
    {
        $user = $event->getUser();

        $client = new Client('https://github.com/api/v2/json/');

        $request = $client->get('user/email/' . $user->getEmail());

        try {
            $response = $request->send();
        } catch (\Exception $e) {
            // User not found
            return;
        }

        $user->setMetadata(array(
            'github' => \json_decode($response->getBody(), true)
        ));
    }
}
