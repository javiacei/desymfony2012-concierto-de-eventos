<?php

namespace DeSymfony\UserBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class RegisterUserListenersPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('event_dispatcher')) {
            return;
        }

        $definition = $container->getDefinition('event_dispatcher');

        foreach ($container->findTaggedServiceIds('desymfony_user.event_listener') as $id => $events) {
            foreach ($events as $event) {
                $priority = isset($event['priority']) ? $event['priority'] : 0;

                if (!isset($event['event'])) {
                    throw new \InvalidArgumentException(
                        sprintf('El servicio "%s" debe de definir el atributo "event" en los tags "desymfony_user.event_listener".', $id)
                    );
                }

                if (!isset($event['method'])) {
                    throw new \InvalidArgumentException(
                        sprintf('Service "%s" debe de definir el atributo "method" en los tags "desymfony_user.event_listener".', $id)
                    );
                }

                $definition->addMethodCall('addListenerService', array($event['event'], array($id, $event['method']), $priority));
            }
        }
    }
}
