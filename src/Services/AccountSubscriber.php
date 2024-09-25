<?php

namespace App\Services;

use App\Entity\Admin;
use App\Entity\Account;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountSubscriber implements EventSubscriberInterface {

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->passwordEncoder = $userPasswordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setPassword', EventPriorities::POST_VALIDATE],
        ];
    }

    public function setPassword(ViewEvent $event)
    {
        $user = $event->getControllerResult();

        if ($user instanceof Account && $user->getPassword()) {
            $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
        } else if($user instanceof Admin && $user->getPassword()) {
            $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
        }
    }

}
