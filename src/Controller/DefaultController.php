<?php

namespace App\Controller;

use App\Security\UserConfirmationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
  /**
   * @Route("/", name="default_index")
   */
  public function index()
  {
    return $this->render(
      'base.html.twig'
    );
  }

  /**
   * @Route("/confirm-user/{token}", name="default_confirm_token")
   * @param string $token
   * @param UserConfirmationService $userConfirmationService
   * @return RedirectResponse
   */
  public function confirmUser(
    string $token,
    UserConfirmationService $userConfirmationService
  )
  {
    $userConfirmationService->confirmUser($token);

    return $this->redirect('https://google.com');
  }
}