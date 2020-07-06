<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Comment;
use App\Entity\User;
use App\Security\TokenGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
  /**
   * @var UserPasswordEncoderInterface
   */
  private $passwordEncoder;

  /**
   * @var Factory
   */
  private $faker;

  private const USERS = [
    [
      'username' => '5094321',
      'email' => 'morgana.freewoman@exodus.com',
      'name' => 'Morgana',
      'gender' => 'Féminin',
      'age' => '24 ans',
      'firstName' => 'Freewoman',
      'password' => 'Mars_Exodus0806',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1996',
      'birthPlace' => 'USA',
      'work' => 'Médecin',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Brun',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/morgana-freewoman.jpeg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '8609631',
      'email' => 'eddy.saturn@exodus.com',
      'name' => 'Saturn',
      'gender' => 'Masculin',
      'age' => '28 ans',
      'firstName' => 'Eddy',
      'password' => 'Mars_Exodus2095',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1996',
      'birthPlace' => 'France',
      'work' => 'Chanteur',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Brun',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/eddy-saturn.jpeg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '8640098',
      'email' => 'julien.donze@exodus.com',
      'name' => 'Donze',
      'gender' => 'Masculin',
      'age' => '24 ans',
      'firstName' => 'Julien',
      'password' => 'Mars_Exodus0531',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1996',
      'birthPlace' => 'France',
      'work' => 'YouTuber',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Brun',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/julien-donze.jpg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '7603462',
      'email' => 'marie.kondo@exodus.com',
      'name' => 'Kondo',
      'gender' => 'Féminin',
      'age' => '40 ans',
      'firstName' => 'Marie',
      'password' => 'Mars_Exodus0021',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1980',
      'birthPlace' => 'Japon',
      'work' => 'Ecrivaine',
      'weight' => '50kg',
      'height' => '155cm',
      'eyeColor' => 'Brun',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/marie-kondo.jpg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '8886542',
      'email' => 'luc.cielmarcheur@exodus.com',
      'name' => 'Cielmarcheur',
      'gender' => 'Masculin',
      'age' => '22 ans',
      'firstName' => 'Luc',
      'password' => 'Mars_Exodus0961',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '07/08/1998',
      'birthPlace' => 'Polis Massa',
      'work' => 'Retraite',
      'weight' => '80kg',
      'height' => '175cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/luc-cielmarcheur.jpg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '2109782',
      'email' => 'amaury.linde@exodus.com',
      'name' => 'Lindé',
      'age' => '28 ans',
      'gender' => 'Masculin',
      'firstName' => 'Amaury',
      'password' => 'Mars_Exodus0649',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '07/08/1992',
      'birthPlace' => 'France',
      'work' => 'Developer Full Stack',
      'weight' => '70kg',
      'height' => '190cm',
      'eyeColor' => 'Bleu',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/amaury-linde.jpeg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '7041572',
      'email' => 'anne-lise.ribeiro@exodus.com',
      'name' => 'Ribeiro',
      'gender' => 'Féminin',
      'age' => '22 ans',
      'firstName' => 'Anne-Lise',
      'password' => 'Mars_Exodus0961',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '07/08/1998',
      'birthPlace' => 'France',
      'work' => 'Styliste',
      'weight' => '50kg',
      'height' => '152cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/annelise-ribeiro.jpeg',
      'ticketUrl' => '/images/User/Tickets/placeholder-ticket.png',
    ],
    [
      'username' => '5639812',
      'email' => 'aymeric.mayeux@exodus.com',
      'name' => 'Mayeux',
      'gender' => 'Masculin',
      'age' => '28 ans',
      'firstName' => 'Aymeric',
      'password' => 'Mars_Exodus9906',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '07/08/1992',
      'birthPlace' => 'France',
      'work' => 'Back-End Developer',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Bleu',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/aymeric-mayeux.jpeg',
      'ticketUrl' => '/images/User/Tickets/aymeric-mayeux-ticket.png',
    ],
    [
      'username' => '1346547',
      'email' => 'bastien.calou@exodus.com',
      'name' => 'Calou',
      'gender' => 'Masculin',
      'age' => '28 ans',
      'firstName' => 'Bastien',
      'password' => 'Mars_Exodus9809',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '07/08/1992',
      'birthPlace' => 'France',
      'work' => 'Front-End Developer',
      'weight' => '70kg',
      'height' => '190cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/bastien-calou.jpeg',
      'ticketUrl' => '/images/User/Tickets/bastien-calou-ticket.png',
    ],
    [
      'username' => '0989812',
      'email' => 'arthur.roudillon@exodus.com',
      'name' => 'Roudillon',
      'gender' => 'Masculin',
      'age' => '28 ans',
      'firstName' => 'Arthur',
      'password' => 'Mars_Exodus7802',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '07/08/1992',
      'birthPlace' => 'France',
      'work' => 'Chargé de projets Marketing',
      'weight' => '75kg',
      'height' => '175cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/arthur-roudillon.png',
      'ticketUrl' => '/images/User/Tickets/arthur-roudillon-ticket.png',
    ],
    [
      'username' => '2368976',
      'email' => 'helene.linglet@exodus.com',
      'name' => 'Linglet',
      'gender' => 'Féminin',
      'age' => '40 ans',
      'firstName' => 'Hélène',
      'password' => 'Mars_Exodus9871',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1980',
      'birthPlace' => 'France',
      'work' => 'Chef de Projet',
      'weight' => '60kg',
      'height' => '175cm',
      'eyeColor' => 'Bleu',
      'hairColor' => 'Blond',
      'profilePicture' => '/images/User/Avatars/helene-linglet.jpeg',
      'ticketUrl' => '/images/User/Tickets/helene-linglet-ticket.png',
    ],
    [
      'username' => '0988976',
      'email' => 'hugues.romain@hetic.net',
      'name' => 'Romain',
      'gender' => 'Masculin',
      'age' => '22 ans',
      'firstName' => 'Hugues',
      'password' => 'Mars_Exodus1456',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '07/08/1998',
      'birthPlace' => 'France',
      'work' => 'Front-End Developer',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Bleu',
      'hairColor' => 'Blond',
      'profilePicture' => '/images/User/Avatars/hugues-romain.jpeg',
      'ticketUrl' => '/images/User/Tickets/hugues-romain-ticket.png',
    ],
    [
      'username' => '0963598',
      'email' => 'maksym.yankivskyy@hetic.net',
      'name' => 'Yankivskyy',
      'gender' => 'Masculin',
      'age' => '22 ans',
      'firstName' => 'Maksym',
      'password' => 'Mars_Exodus6592',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '07/08/1998',
      'birthPlace' => 'Ukraine',
      'work' => 'Front-End Developer',
      'weight' => '70kg',
      'height' => '175cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/maksym-yankivskyy.jpeg',
      'ticketUrl' => '/images/User/Tickets/maksym-yankivskyy-ticket.png',
    ],
    [
      'username' => '0980723',
      'email' => 'gabriel.avedikian@exodus.com',
      'name' => 'Avedikian',
      'gender' => 'Masculin',
      'age' => '28 ans',
      'firstName' => 'Gabriel',
      'password' => 'Mars_Exodus0890',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true,
      'birthDate' => '01/01/1992',
      'birthPlace' => 'France',
      'work' => 'Service Designer',
      'weight' => '70kg',
      'height' => '170cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/gabriel-avedikian.jpeg',
      'ticketUrl' => '/images/User/Tickets/gabriel-avedikian-ticket.png',
    ],
    [
      'username' => '3670287',
      'email' => 'amandine.donat-filliod@exodus.com',
      'name' => 'Donat-Filliod',
      'gender' => 'Féminin',
      'age' => '23 ans',
      'firstName' => 'Amandine',
      'password' => 'Mars_Exodus8491',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '16/05/1997',
      'birthPlace' => 'France',
      'work' => 'Designer',
      'weight' => '55',
      'height' => '158',
      'eyeColor' => 'Marron',
      'hairColor' => 'Marron',
      'profilePicture' => '/images/User/Avatars/amandine-donatfilliod.jpg',
      'ticketUrl' => '/images/User/Tickets/amandine-donatfilliod-ticket.png',
    ],
    [
      'username' => '5749987',
      'email' => 'nastasia.dotlic@exodus.com',
      'name' => 'Dotlic',
      'gender' => 'Féminin',
      'age' => '27 ans',
      'firstName' => 'Nastasia',
      'password' => 'Mars_Exodus5738',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true,
      'birthDate' => '12/03/1993',
      'birthPlace' => 'France',
      'work' => 'UX/UI Designer',
      'weight' => '67kg',
      'height' => '180cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Blanc',
      'profilePicture' => '/images/User/Avatars/nastasia-dotlic.jpg',
      'ticketUrl' => '/images/User/Tickets/nastasia-dotlic-ticket.png',
    ],
    [
      'username' => '5275479',
      'email' => 'louis.78100@hotmail.fr',
      'name' => 'Zawadka',
      'age' => '21 ans',
      'gender' => 'Masculin',
      'firstName' => 'Louis',
      'password' => 'Louis123',
      'roles' => [User::ROLE_SUPERADMIN],
      'enabled' => true,
      'birthDate' => '31/05/1999',
      'birthPlace' => 'France',
      'work' => 'Developer Back-end',
      'weight' => '62kg',
      'height' => '178cm',
      'eyeColor' => 'Marron',
      'hairColor' => 'Brun',
      'profilePicture' => '/images/User/Avatars/louis-zawadka.jpg',
      'ticketUrl' => '/images/User/Tickets/louis-zawadka-ticket.png',
    ],
  ];

  /**
   * @var TokenGenerator
   */
  private $tokenGenerator;

  public function __construct(UserPasswordEncoderInterface $passwordEncoder, TokenGenerator $tokenGenerator)
  {
    $this->passwordEncoder = $passwordEncoder;
    $this->faker = Factory::create();
    $this->tokenGenerator = $tokenGenerator;
  }

  public function load(ObjectManager $manager)
  {
    $this->loadUsers($manager);
    $this->loadBlogPost($manager);
    $this->loadComments($manager);
  }

  public function loadBlogPost(ObjectManager $manager)
  {
    for ($i = 0; $i < 10; $i++) {
      $blogPost = new BlogPost();
      $blogPost->setTitle($this->faker->realText(10));
      $blogPost->setPublished($this->faker->dateTimeThisYear);
      $blogPost->setContent($this->faker->sentence(10));

      $authorReference = $this->getRandomUserReference($blogPost);

      $blogPost->setAuthor($authorReference);
      $blogPost->setSlug($this->faker->slug);

      $this->addReference("blog_post_$i", $blogPost);

      $manager->persist($blogPost);
    }

    $manager->flush();
  }

  public function loadComments(ObjectManager $manager)
  {
    for ($i = 0; $i < 10; $i++) {
      for ($j = 0; $j < rand(1,5); $j++) {
        $comment = new Comment();
        $comment->setPublished($this->faker->dateTimeThisYear);
        $comment->setContent($this->faker->sentence(10));

        $authorReference = $this->getRandomUserReference($comment);

        $comment->setAuthor($authorReference);
        $comment->setBlogPost($this->getReference("blog_post_$i"));

        $manager->persist($comment);
      }
    }
    $manager->flush();
  }

  public function loadUsers(ObjectManager $manager)
  {
    foreach (self::USERS as $userFixture) {
      $user = new User();
      $user->setName($userFixture['name']);
      $user->setFirstName($userFixture['firstName']);
      $user->setEmail($userFixture['email']);
      $user->setUsername($userFixture['username']);

      $user->setPassword(
        $this->passwordEncoder->encodePassword(
          $user,
          $userFixture['password']
      ));

      $user->setRoles($userFixture['roles']);
      $user->setEnabled($userFixture['enabled']);
      $user->setBirthDate($userFixture['birthDate']);
      $user->setGender($userFixture['gender']);
      $user->setAge($userFixture['age']);
      $user->setBirthPlace($userFixture['birthPlace']);
      $user->setHairColor($userFixture['hairColor']);
      $user->setHeight($userFixture['height']);
      $user->setWeight($userFixture['weight']);
      $user->setWork($userFixture['work']);
      $user->setEyeColor($userFixture['eyeColor']);
      $user->setProfilePicture($userFixture['profilePicture']);
      $user->setTicketUrl($userFixture['ticketUrl']);

      if(!$userFixture['enabled']) {
        $user->setConfirmationToken(
          $this->tokenGenerator->getRandomSecureToken()
        );
      }

      $this->addReference('user_'.$userFixture['username'], $user);

      $manager->persist($user);
    }
    $manager->flush();
  }

  protected function getRandomUserReference($entity): User
  {
    $randomUser = self::USERS[rand(0, 4)];

    /* sif($entity instanceof BlogPost && !count(array_intersect(
        $randomUser['roles'],
        [
          User::ROLE_SUPERADMIN,
          User::ROLE_ADMIN,
          User::ROLE_WRITER
        ]
      ))) {
      return $this->getRandomUserReference($entity);
    }

    if($entity instanceof Comment && !count(
        array_intersect(
          $randomUser['roles'],
          [
            User::ROLE_SUPERADMIN,
            User::ROLE_ADMIN,
            User::ROLE_WRITER
          ]
        )
      )) {
      return $this->getRandomUserReference($entity);
    }*/

    return $this->getReference(
      'user_'.$randomUser['username']
    );
  }
}


