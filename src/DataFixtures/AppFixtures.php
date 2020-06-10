<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
  public function __construct()
  {
  }

  public function load(ObjectManager $manager)
  {
    $this->loadUsers($manager);
    $this->loadBlogPost($manager);
  }

  public function loadBlogPost(ObjectManager $manager)
  {
    $user = $this->getReference('user');

    $blogPost = new BlogPost();
    $blogPost->setTitle('A first post');
    $blogPost->setPublished(new \DateTime('2020-07-02 12:00:00'));
    $blogPost->setContent('Post text');
    $blogPost->setAuthor($user);
    $blogPost->setSlug('heyhey');

    $manager->persist($blogPost);

    $blogPost = new BlogPost();
    $blogPost->setTitle('A second post');
    $blogPost->setPublished(new \DateTime('2020-07-02 15:00:00'));
    $blogPost->setContent('Post texts');
    $blogPost->setAuthor($user);
    $blogPost->setSlug('YOYO');

    $manager->persist($blogPost);

    $manager->flush();
  }

  public function loadComments(ObjectManager $manager)
  {

  }

  public function loadUsers(ObjectManager $manager)
  {
    $user = new User();
    $user->setName('Louis');
    $user->setEmail('Louis.78100@hotmail.fr');
    $user->setUsername('Louis');
    $user->setPassword('Louis123');

    $this->addReference('user', $user);

    $manager->persist($user);
    $manager->flush();

  }
}
