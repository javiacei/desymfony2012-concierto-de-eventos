<?php

namespace DeSymfony\UserBundle\Event;

final class UserEvents
{
    /**
     * El evento desymfony.pre_user_save se lanza antes de crearse un usuario
     * en el sistema
     *
     * El listener recibirá una instancia de DeSymfony\UserBundle\Event\GetUserEvent
     *
     * @var string
     */
    const PRE_USER_SAVE = 'desymfony.pre_user_save';
}
