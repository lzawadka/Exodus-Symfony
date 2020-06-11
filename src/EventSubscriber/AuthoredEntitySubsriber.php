<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\AuthoredEntityInterface;
use App\Entity\BlogPost;
use App\Entity\Comment;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

class AuthoredEntitySubsriber implements EventSubscriberInterface
{
  /**
   * @var TokenStorageInterface
   */
  private $tokenStorage;

  public function __construct(TokenStorageInterface $tokenStorage)
  {
    $this->tokenStorage = $tokenStorage;
  }

  public static function getSubscribedEvents()
  {
    return [
      KernelEvents::VIEW => ['getAuthenticatedUser', EventPriorities::PRE_WRITE]
    ];
  }

  public function  getAuthenticatedUser(ViewEvent $event)
  {
    $entity = $event->getControllerResult();
    $method = $event->getRequest()->getMethod();

    /** @var UserInterface $author */
    $author = $this->tokenStorage->getToken()->getUser();

    if (!$entity instanceof AuthoredEntityInterface || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
      return;
    }

    $entity->setAuthor($author);
  }
}