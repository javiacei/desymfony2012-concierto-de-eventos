<?php

namespace DeSymfony\UserBundle\Event;

/*
 * UserEvents
 */
final class UserEvents
{
    /**
     * El evento desymfony.pre_user_save se lanza antes de crearse un usuario
     * en el sistema.
     *
     * El listener recibirá una instancia de DeSymfony\UserBundle\Event\GetUserEvent
     *
     */
    const PRE_USER_SAVE = 'de_symfony_user.pre_user_save';
}
