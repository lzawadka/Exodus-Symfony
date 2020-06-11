<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Comment;
use App\Entity\User;
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
      'username' => 'Louis',
      'email' => 'louis.7810@hotmail.fr',
      'name' => 'Zawadka',
      'password' => 'Louis123'
    ],
    [
      'username' => 'Louis1',
      'email' => 'louis.7810000@hotmail.fr',
      'name' => 'Zawadka',
      'password' => 'Louis123'
    ],
    [
      'username' => 'Louis2',
      'email' => 'louis.781000@hotmail.fr',
      'name' => 'Zawadka',
      'password' => 'Louis123'
    ],
    [
      'username' => 'Louis3',
      'email' => 'louis.78100@hotmail.fr',
      'name' => 'Zawadka',
      'password' => 'Louis123'
    ],
  ];

  public function __construct(UserPasswordEncoderInterface $passwordEncoder)
  {
    $this->passwordEncoder = $passwordEncoder;
    $this->faker = Factory::create();
  }

  public function load(ObjectManager $manager)
  {
    $this->loadUsers($manager);
    $this->loadBlogPost($manager);
    $this->loadComments($manager);
  }

  public function loadBlogPost(ObjectManager $manager)
  {
    $user = $this->getReference('user');

    for ($i = 0; $i < 10; $i++) {
      $blogPost = new BlogPost();
      $blogPost->setTitle($this->faker->realText(10));
      $blogPost->setPublished($this->faker->dateTimeThisYear);
      $blogPost->setContent($this->faker->sentence(10));

      $authorReference = $this->getReference($this->getRandomUserReference());

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
      for ($j = 0; $j < rand(1,10); $j++) {
        $comment = new Comment();
        $comment->setPublished($this->faker->dateTimeThisYear);
        $comment->setContent($this->faker->sentence(10));

        $authorReference = $this->getReference($this->getRandomUserReference());

        $comment->setAuthor($authorReference);
        $comment->setBlogPost($this->getReference("blog_post_$i"));

        $manager->persist($comment);
      }
    }
    $manager->flush();
  }

  public function loadUsers(ObjectManager $manager)
  {
    foreach(self::USERS as $userFixture) {
      $user = new User();
      $user->setName($userFixture['name']);
      $user->setEmail($userFixture['email']);
      $user->setUsername($userFixture['username']);

      $user->setPassword($this->passwordEncoder->encodePassword(
        $user,
        $userFixture['password']
      ));

      $this->addReference('user_' . $userFixture['username'], $user);

      $manager->persist($user);
    }

    $manager->flush();
  }

  protected function getRandomUserReference(): User
  {
    return $this->getReference('user_'.self::USERS[rand(0,3)]['username']);
  }
}
