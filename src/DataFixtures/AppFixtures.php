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
      'username' => '1346547',
      'email' => 'bastien.calou@exodus.com',
      'name' => 'Calou',
      'password' => 'Mars_Exodus9809',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true
    ],
    [
      'username' => '2368976',
      'email' => 'helene.linglet@exodus.com',
      'name' => 'Linglet',
      'password' => 'Mars_Exodus9871',
      'roles' => [User::ROLE_WRITER],
      'enabled' => true
    ],
    [
      'username' => '0988976',
      'email' => 'hugues.romain@hetic.net',
      'name' => 'Romain',
      'password' => 'Mars_Exodus1456',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true
    ],
    [
      'username' => '0963598',
      'email' => 'maksym.yankivskyy@hetic.net',
      'name' => 'Yankivskyy',
      'password' => 'Mars_Exodus6592',
      'roles' => [User::ROLE_ADMIN],
      'enabled' => true
    ],
    [
      'username' => '0980723',
      'email' => 'gabriel.avedikian@exodus.com',
      'name' => 'Avedikian',
      'password' => 'Mars_Exodus0890',
      'roles' => [User::ROLE_WRITER],
      'enabled' => false
    ],
    [
      'username' => '5275479',
      'email' => 'louis.78100@hotmail.fr',
      'name' => 'Zawadka',
      'password' => 'Louis123',
      'roles' => [User::ROLE_SUPERADMIN],
      'enabled' => true
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
      $user->setEmail($userFixture['email']);
      $user->setUsername($userFixture['username']);

      $user->setPassword(
        $this->passwordEncoder->encodePassword(
          $user,
          $userFixture['password']
      ));
      $user->setRoles($userFixture['roles']);
      $user->setEnabled($userFixture['enabled']);

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
