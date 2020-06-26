<?php


namespace App\Email;

use App\Entity\User;
use Swift_Message;
use Twig\Environment;

class Mailer
{
  /**
   * @var \Swift_Mailer
   */
  private $mailer;
  /**
   * @var Environment
   */
  private $twig;

  public function __construct(
    \Swift_Mailer $mailer,
    Environment $twig
  )
  {
    $this->mailer = $mailer;
    $this->twig = $twig;
  }

  public function sendConfirmationEmail(User $user)
  {
    $body = $this->twig->render(
      'email/confirmation.html.twig',
      [
        'user' => $user,
      ]
    );

    //Send email
    $message = (new Swift_Message('Confirmez votre compte'))
      ->setFrom('mars.exodus2060@gmail.com')
      ->setTo($user->getEmail())
      ->setBody($body, 'text/html');

    $this->mailer->send($message);
  }
}