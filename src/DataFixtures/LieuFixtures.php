<?php


namespace App\DataFixtures;


use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LieuFixtures extends Fixture
{


  public function load(ObjectManager $manager)
  {
    $this->loadLieu($manager);
  }

  private const LIEU = [
    [
      "Category" => "Mont",
      "CoverImage" => "url",
      "DoubleMedia" => ["url", "url"],
      "PlaceName" => "Mont Olympus",
      "Texte" => "c'est une montagne"
    ],
    [
      "Category" => "Mont",
      "CoverImage" => "url",
      "DoubleMedia" => ["url", "url"],
      "PlaceName" => "Mont Olympus",
      "Texte" => "c'est une montagne"
    ],
  ];

  protected function loadLieu(ObjectManager $manager) {
    foreach (self::LIEU as $lieuFixture) {
      $lieu = new Lieu();
      $lieu->setCategory($lieuFixture['Category']);
      $lieu->setCoverImage($lieuFixture['CoverImage']);
      $lieu->setDoubleMedia($lieuFixture['DoubleMedia']);
      $lieu->setPlaceName($lieuFixture['PlaceName']);
      $lieu->setTexte($lieuFixture['Texte']);

      $manager->persist($lieu);
    }
    $manager->flush();
  }
}