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
      "Category" => "Le Cratère",
      "CoverImage" => "/images/Lieu/Gale/Cover-Gale.jpg",
      "DoubleMedia" => [
        "/images/Lieu/Gale/Gale-1.jpg",
        "/images/Lieu/Gale/Gale-2.jpg"
      ],
      "PlaceName" => "Gale",
      "Texte" => [
        "Gale est un cratère d'impact d'environ 155 km de diamètre situé sur la planète Mars dans le quadrangle d'Aeolis, à la limite géologique matérialisant la dichotomie crustale martienne, par 5,4° S et 137,7° E, dans la région d'Aeolis Mensae. Il est particulièrement reconnaissable à son imposant monticule central, dénommé une première fois Mont Sharp, puis officiellement rebaptisé Aeolis Mons, haut de plus de 5 000 m au-dessus de la plaine du fond du cratère, dénommée Aeolis Palus, et culminant à environ 700 m au-dessus du niveau de référence martien, c'est-à-dire plus haut que la plupart des autres reliefs des environs, et plus de 2 000 m au-dessus de l'altitude moyenne des rebords du cratère. Ce cratère, retenu par la NASA en juillet 2011, a été choisi comme site d'atterrissage pour le rover Curiosity de la mission Mars Science Laboratory, lancée le 26 novembre 2011 ; Curiosity s'est posé sur Mars le 6 août 2012 comme prévu."
      ]
    ],
    [
      "Category" => "Le Cratère",
      "CoverImage" => "/images/Lieu/Endurance/Cover-Endurance.jpeg",
      "DoubleMedia" => [
        "/images/Lieu/Endurance/Endurance-1.jpg",
        "/images/Lieu/Endurance/Endurance-2.jpg"
      ],
      "PlaceName" => "Endurance",
      "Texte" => [
        "Endurance est un cratère d'impact situé dans Meridiani Planum sur Mars, connu pour avoir été visité du 30 avril au 13 décembre 2004 par le rover Opportunity du programme Mars Exploration Rover. Celui-ci avait atterri trois mois plus tôt, en janvier 2004, et il est toujours actif en Août 2016.",
        "Nommé d'après l’Endurance, navire utilisé par Ernest Shackleton lors de l'expédition Endurance, le cratère a un diamètre de 130 m pour une profondeur d'environ 20 mètres."
      ]
    ],
    [
      "Category" => "La Terre du Chaos",
      "CoverImage" => "/images/Lieu/ArsinoesChaos/Cover-ArsinoesChaos.jpg",
      "DoubleMedia" => [
        "/images/Lieu/ArsinoesChaos/ArsinoesChaos-1.jpg",
        "/images/Lieu/ArsinoesChaos/ArsinoesChaos-2.jpg"
      ],
      "PlaceName" => "Arsinoe Chaos",
      "Texte" => [
        "Arsinoes Chaos est un terrain du chaos dans le quadrilatère Margaritifer Sinus sur Mars. Il fait 200 km de diamètre. Son emplacement est de 7,66 ° S et 27,9 ° W. Arsinoes Chaos a été nommé d'après Arsinoe , une reine de l'Égypte ancienne, fille de Ptolémée et de Bérénice.",
        "Le terrain du chaos sur Mars est distinctif, rien sur Terre ne se compare à lui. Le terrain du chaos se compose généralement de groupes irréguliers de gros blocs, de quelques dizaines de kilomètres de diamètre et d'une centaine de mètres ou plus. Les blocs inclinés et à sommet plat forment des dépressions de plusieurs centaines de mètres de profondeur. Une région chaotique peut être reconnue par un nid de rats de mesas, de buttes et de collines, découpées à travers des vallées qui par endroits semblent presque modelées. Certaines parties de cette zone chaotique ne se sont pas complètement effondrées - elles sont toujours formées en grandes mesas, donc elles peuvent toujours contenir de la glace d'eau."
      ]
    ],
    [
      "Category" => "Le Canyon",
      "CoverImage" => "/images/Lieu/CopratesChasma/Cover-CopratesChasma.jpeg",
      "DoubleMedia" => [
        "/images/Lieu/CopratesChasma/CopratesChasma-1.jpg",
        "/images/Lieu/CopratesChasma/CopratesChasma-2.jpg"
      ],
      "PlaceName" => "Coprates Chasma",
      "Texte" => [
        "Coprates Chasma est un immense canyon dans le quadrilatère Coprates de Mars. Il mesure 966 km de long et a été nommé d'après un nom d'albédo classique.",
        "Près de 60 ° O est le point le plus profond du système Valles Marineris (ainsi que son point le plus bas par élévation) à 11 km sous le plateau environnant. Vers l'est à partir d'ici, il y a une pente ascendante d'environ 0,03 degré avant d'atteindre les canaux d'écoulement, ce qui signifie que si vous remplissiez le canyon de fluide, cela créerait un lac d'une profondeur de 1 km avant que le fluide ne déborde sur les plaines du nord.",
        "Keith Harrison et Mary Chapman ont décrit des preuves solides d'un lac dans la partie orientale de Valles Marineris, en particulier dans Coprates Chasma. Il aurait eu une profondeur moyenne de seulement 842 m, beaucoup plus petite que la profondeur de 5 à 10 km de parties de Valles Marineris. Pourtant, son volume de 110 000 milles cubes serait comparable à la mer Caspienne et à la mer Noire . La principale preuve d'un tel lac est la présence de bancs au niveau que les modèles montrent où le niveau du lac devrait être. De plus, le point bas d'Eos Chasma où l'on s'attend à ce que l'eau déborde est marqué par des caractéristiques fluviales. Les caractéristiques semblent que l'écoulement s'est réuni en un petit point et a effectué une érosion importante.",
        "Le fond des Coprates Chasma contient un grand champ de petits cônes dénoyautés qui ont été interprétés comme des équivalents martiens de volcans ignés terrestres ou de boue."
      ]
    ],
    [
      "Category" => "La Plaine",
      "CoverImage" => "/images/Lieu/AmazonisPlanitia/Cover-AmazonisPlanitia.jpg",
      "DoubleMedia" => [
        "/images/Lieu/AmazonisPlanitia/AmazonisPlanitia-1.jpg",
        "/images/Lieu/AmazonisPlanitia/AmazonisPlanitia-2.jpg"
      ],
      "PlaceName" => "Amazonis Planitia",
      "Texte" => [
        "Amazonis Planitia est l'une des plaines les plus lisses de Mars . Il est situé entre les Tharsis et Elysium provinces volcaniques, à l'ouest de Olympus Mons , dans les Amazonis et Memnonia quadrilatères , centrée à 24.8 ° N ° 196,0 E . La topographie de la plaine présente des caractéristiques extrêmement lisses à plusieurs longueurs d'échelle différentes. Une grande partie de la formation Medusae Fossae se trouve dans Amazonis Planitia.",
        "Son nom dérive de l'un des traits d'albédo classiques observés par les premiers astronomes, qui à son tour a été nommé d'après les Amazones , une race mythique de femmes guerrières."
      ]
    ],
    [
      "Category" => "Le Canyon",
      "CoverImage" => "/images/Lieu/VallesMarineris/Cover-VallesMarineris.jpg",
      "DoubleMedia" => [
        "/images/Lieu/VallesMarineris/VallesMarineris-1.jpg",
        "/images/Lieu/VallesMarineris/VallesMarineris-2.jpg"
      ],
      "PlaceName" => "Valles Marineris",
      "Texte" => [
        "Valles Marineris (latin signifiant « les vallées de Mariner », en l'honneur de Mariner 9) est un vaste système de canyons à proximité de l'équateur de la planète Mars entre le renflement de Tharsis — notamment Syria Planum et Noctis Labyrinthus — à l'ouest, et Margaritifer Terra à l'est.  Il s'étendant sur 3 770 km, son plancher se situe couramment à 5 km sous le niveau de référence martien tandis que les plateaux qu'il traverse ont une altitude dépassant par endroits 5 km au-dessus du niveau de référence martien, ce qui conduit à des dénivelés généralement voisins de 10 000 m. Il s'agirait d'un énorme fossé d'effondrement élargi par l'érosion jusqu'à atteindre localement une largeur de 600 km2. En l'état actuel de nos connaissances, ce serait la plus importante structure de ce type dans le Système solaire."
      ]
    ],
    [
      "Category" => "La Dune",
      "CoverImage" => "/images/Lieu/NiliPatera/Cover-NiliPatera.jpg",
      "DoubleMedia" => [
        "/images/Lieu/NiliPatera/NiliPatera-1.jpg",
        "/images/Lieu/NiliPatera/NiliPatera-2.jpg"
      ],
      "PlaceName" => "Nili Patera",
      "Texte" => [
        "Nili Patera est un champ de dunes sur Mars . Il est situé au sommet d'un lit de lave , à l'emplacement d'un ancien volcan, la caldeira Nili Patera de Syrtis Major , près de l'équateur martien et c'est l'un des champs de dunes les plus actifs de Mars. Ses coordonnées de localisation sur Mars sont 8,7 ° de latitude N, 67,3 ° de longitude E.",
        "Il est activement étudié par la caméra HiRISE , à bord du Mars Reconnaissance Orbiter, à raison d'une image toutes les six semaines. L'étude du mouvement des dunes renseigne sur la variation du vent en fonction du temps et approfondit l'étude des caractéristiques d'érosion de surface du paysage martien. Ces informations peuvent ensuite être utilisées pour le développement et la conception de futures expéditions sur Mars. Les dunes du champ Patera sont du type barchan et leur étude par HiRISE a été la première à établir un mouvement de dunes et d'ondulations d'au moins 1 mètre (3 pieds 3 pouces) sur Mars. Le champ de dunes de Patera a également été le premier à être étudié à l'aide du logiciel COSI-Corr, qui a été initialement développé pour analyser le mouvement des dunes terrestres. Les résultats de la recherche à partir des preuves fournies par la surveillance du champ de Nili Patera, indiquent des flux de sable de l'ordre de plusieurs mètres cubes par mètre par an, similaires au flux observé dans les dunes de sable de la vallée de Victoria en Antarctique ."
      ]
    ],
    [
      "Category" => "Le Cratère",
      "CoverImage" => "/images/Lieu/Proctor/Cover-Proctor.jpg",
      "DoubleMedia" => [
        "/images/Lieu/Proctor/proctor-1.jpg",
        "/images/Lieu/Proctor/proctor-2.jpg"
      ],
      "PlaceName" => "Proctor",
      "Texte" => [
        "Proctor est un grand cratère du quadrilatère Noachis de Mars , situé à 48 ° de latitude sud et 330,5 ° de longitude ouest. Il mesure 168,2 kilomètres (104,5 miles) de diamètre et a été nommé d'après Richard A. Proctor , un astronome britannique (1837–1888).",
        "Le cratère contient un champ de dunes sombres de 35 x 65 km . C'était l'un des premiers champs de dunes de sable jamais reconnu sur Mars basé sur des images de Mariner 9 . Les dunes du cratère sont surveillées par HiRISE pour identifier les changements au fil du temps."
      ]
    ],
    [
      "Category" => "La Dune",
      "CoverImage" => "/images/Lieu/Matara/Cover-Matara.jpg",
      "DoubleMedia" => [
        "/images/Lieu/Matara/Matara-1.jpg",
        "/images/Lieu/Matara/Matara-2.jpg"
      ],
      "PlaceName" => "Cratère Matara",
      "Texte" => [
        "Les ravines sur les dunes de sable martiennes, comme celles du cratère de Matara , ont été très actives, avec de nombreux écoulements au cours des dix dernières années. Les écoulements se produisent généralement en cas de gel saisonnier. Une ravine est une formation géomorphologique et hydrogéologique naturelle. Cette forme élémentaire d'érosion est créée par le ruissellement concentré des eaux sur un versant. Les ravines peuvent constituer des réseaux et rejoindre le réseau hydrographique."
      ]
    ],
    [
      "Category" => "Le Volcan",
      "CoverImage" => "/images/Lieu/MontOlympus/Cover-MontOlympus.jpg",
      "DoubleMedia" => [
        "/images/Lieu/MontOlympus/montOlympus-1.jpg",
        "/images/Lieu/MontOlympus/montOlympus-2.png"],
      "PlaceName" => "Mont Olympus",
      "Texte" => [
        "Olympus Mons, nom latin pour « mont Olympe », est un volcan bouclier de la planète Mars situé dans les quadrangles d'Amazonis et de Tharsis. C'est le plus haut relief connu du système solaire, culminant à 21 229 mètres au-dessus du niveau de référence martien ; des altitudes supérieures sont encore très souvent publiées, même récemment sur des sites institutionnels américains tels ceux de la NASA, mais relèvent d'estimations du xxe siècle antérieures aux mesures de l'altimètre laser de Mars Global Surveyor (MOLA) et sont fondées sur un niveau de référence des altitudes martiennes alors inférieur de 4 à 6 km.",
        "Olympus Mons s'élève à 22,5 km en moyenne au-dessus des plaines environnantes, dont l'altitude est inférieure au niveau de référence. Depuis la fin du xixe siècle, cette gigantesque formation était connue des astronomes comme une particularité à fort albédo avant que les sondes spatiales ne révèlent sa nature montagneuse. Son premier nom, Nix Olympica, en français « Neige de l'Olympe », lui a été donné par l'astronome italien Giovanni Schiaparelli."
      ]
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