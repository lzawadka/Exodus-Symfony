<?php


namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Articles;
use App\Entity\Section;

class ArticlesFixture extends Fixture
{
  public function load(ObjectManager $manager)
  {
      $this->loadArticles($manager);
      $this->loadSection($manager);
  }

  private const ARTICLES = [
    [
      'title' => 'Le voyage',
      'intro' => 'A quoi devez-vous vous attendre pendant les 7 mois de voyages à travers l’espace',
      'coverImage' => '/images/Articles/Le-Voyage/Le-voyage-Cover.jpg',
      'timeToRead' => '2 min'
    ],
    [
      'title' => 'Le voyage',
      'intro' => 'A quoi devez-vous vous attendre pendant les 7 mois de voyages à travers l’espace',
      'coverImage' => '/images/Articles/Le-Voyage/Le-voyage-Cover.jpg',
      'timeToRead' => '2 min'
    ],
  ];

  private const SECTION = [
    [],
    [],
  ];

  public function loadArticles(ObjectManager $manager)
  {
    foreach(self::ARTICLES as $articleFixture)
    {
      $article = new Articles();
    }

  }

  public function loadSection(ObjectManager $manager)
  {
    foreach(self::SECTION as $articleFixture)
    {
      $section = new Section();
    }
  }
}