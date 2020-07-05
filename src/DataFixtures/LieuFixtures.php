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
      "CoverImage" => "/images/Lieu/Mont-Olympus/Cover-Mont-Olympus.jpg",
      "DoubleMedia" => ["/images/Lieu/Mont-Olympus/Mont-Olympus.jpeg", ""],
      "PlaceName" => "Mont Olympus",
      "Texte" => ["Il s'agit tout simplement du plus grand volcan et de la plus haute montagne du Système solaire. Il culmine à près de 22 000 mètres au-dessus de la surface de référence de Mars."]
    ],
    [
      "Category" => "Dune",
      "CoverImage" => "/images/Lieu/Matara/Cover-Matara.jpg",
      "DoubleMedia" => ["/images/Lieu/Matara/Matara.jpeg", ""],
      "PlaceName" => "Dune du cratère Matara",
      "Texte" => ["Les ravins des dunes de sable comme ceux du cratère Matara, sont très actifs, avec de nombreuses coulées au cours des dix dernières années. Les débits se produisent généralement en présence de gel saisonnier."]
    ],
    [
      "Category" => "Proctor",
      "CoverImage" => "/images/Lieu/Proctor/Cover-Proctor.jpg",
      "DoubleMedia" => ["/images/Lieu/Proctor/Proctor.jpeg", ""],
      "PlaceName" => "Cratère Proctor à Noachis Terra",
      "Texte" => ["Les zones sombres sont des dunes de sable basaltique, accumulé au fond du cratère Proctor. Ce dernier fait 150 km de diamètre et est situé dans les hautes terres du Sud de Mars."]
    ],
    [
      "Category" => "Nili Patera",
      "CoverImage" => "/images/Lieu/Patera/Patera-Cover.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Nili Patera à Syrtis Major",
      "Texte" => ["C'est une région de migration active du sable et d'érosion du paysage. Au cours d'un peu moins de deux années terrestres, les dunes ont migré avec des différences de position de quelques mètres dans certaines zones et les ondulations à la surface des dunes ont subi tellement de changements qu'il est impossible de les suivre de façon fiable."]
    ],
    [
      "Category" => "Elysium",
      "CoverImage" => "/images/Lieu/Elysium/Cover-Elysium.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Les pyramides d'Elysium à Elysium Planitia",
      "Texte" => ["Il s'agit de collines ressemblant à des pyramides découvertes lors du survol de la région par la sonde Mariner 9 en 1972. Plus tard, d'autres structures pyramidales ont été observées dans la région de Cydonia Mensae, où se trouve le fameux \"visage de Mars\""]
    ],
    [
      "Category" => "Planitia",
      "CoverImage" => "/images/Lieu/Planitia/Cover-Planitia.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Amazonis Planitia",
      "Texte" => ["Sur cette plaine basse, qui est l'une des plus lisses de la planète, on peut observer des tourbillons de poussière. La longueur de l'ombre du tourbillon de poussière indique que le panache de poussière atteint plus de 800 mètres de hauteur."]
    ],
    [
      "Category" => "Basaltique",
      "CoverImage" => "/images/Lieu/Basaltique/Cover-Basaltique.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Dunes de sable basaltique au pôle Nord",
      "Texte" => ["Le pôle Nord est entouré d'une vaste \"mer\" de dunes de sable basaltique. Celles-ci ressemblent aux barkhanes — ces dunes que l'on trouve généralement dans les régions désertique sur Terre en forme de croissant allongé dans le sens du vent."]
    ],
    [
      "Category" => "Calotte polaire Nord",
      "CoverImage" => "/images/Lieu/Calotte-Polaire-Nord/Cover-Calotte-Polaire-Nord.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Calotte polaire Nord",
      "Texte" => ["Le pôle Nord est entouré d'une vaste \"mer\" de dunes de sable basaltique. Celles-ci ressemblent aux barkhanes — ces dunes que l'on trouve généralement dans les régions désertique sur Terre en forme de croissant allongé dans le sens du vent."]
    ],
    [
      "Category" => "Calotte polaire Sud",
      "CoverImage" => "/images/Lieu/Calotte-Polaire-Sud/Cover-Calotte-Polaire-Sud.jpg",
      "DoubleMedia" => ["", ""],
      "PlaceName" => "Calotte polaire Sud",
      "Texte" => ["Pendant l'hiver, les températures près des pôles Nord et Sud sont si basses (environ -125°C) que le dioxyde de carbone de l'atmosphère se condense sous forme de glace, à la surface. L'été, il se sublime, ce qui crée de puissants vents soufflant jusqu'à 400 km/h aux pôles."]
    ],
    [
      "Category" => "Aeolis",
      "CoverImage" => "/images/Lieu/Aeolis/Cover-Aeolis.jpg",
      "DoubleMedia" => ["/images/Lieu/Aeolis/Aeolis.jpeg", ""],
      "PlaceName" => "Cratère Gale à Aeolis Mensae",
      "Texte" => ["Il s'agit d'un cratère d'environ 155 km de diamètre, reconnaissable grâce à son imposant monticule central baptisé \"Mont Sharp\" avant d'être renommé \"Aeolis Mons\"."]
    ],
  ];

  protected function loadLieu(ObjectManager $manager) {
    foreach (self::LIEU as $lieuFixture) {
      $lieu = new Lieu();
      $lieu->setCategory($lieuFixture['Category']);
      $lieu->setCoverImage($lieuFixture['CoverImage']);
      $lieu->setDoubleMedia($lieuFixture['DoubleMedia']);
      $lieu->setPlaceName($lieuFixture['PlaceName']);
      $lieu->setText($lieuFixture['Texte']);

      $manager->persist($lieu);
    }
    $manager->flush();
  }
}