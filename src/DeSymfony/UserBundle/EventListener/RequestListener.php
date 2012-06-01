<?php

namespace DeSymfony\UserBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
    }
}
