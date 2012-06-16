<?php

/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace DeSymfony\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use DeSymfony\UserBundle\DependencyInjection\Compiler\RegisterUserListenersPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DeSymfonyUserBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RegisterUserListenersPass());
     }
}
