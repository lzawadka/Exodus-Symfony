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
      $blogPost->setAuthor($user);
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
        $comment->setAuthor($this->getReference('user'));
        $comment->setBlogPost($this->getReference("blog_post_$i"));

        $manager->persist($comment);
      }
    }
    $manager->flush();
  }

  public function loadUsers(ObjectManager $manager)
  {
    $user = new User();
    $user->setName('Louis');
    $user->setEmail('Louis.78100@hotmail.fr');
    $user->setUsername('Louis');
    $user->setPassword($this->passwordEncoder->encodePassword(
      $user,
      'louis123'
    ));

    $this->addReference('user', $user);

    $manager->persist($user);
    $manager->flush();

  }
}
