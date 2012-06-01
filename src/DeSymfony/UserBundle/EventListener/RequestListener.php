<?php

namespace DeSymfony\UserBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class RequestListener
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->logger->info("Evento notificado **kernel.request** por el bundle DeSymfonyUserBundle");
    }
}
