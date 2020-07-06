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
      'title' => 'Elon Musk',
      'intro' => 'L’homme à l’origine de Mars Exodus 2060',
      'coverImage' => '/images/Articles/Elon-Musk/Musk-Cover.jpg',
      'timeToRead' => '2 min'
    ],
    [
      'title' => 'Starships',
      'intro' => 'Tout savoir sur nos moyens de transports et le décollage',
      'coverImage' => '/images/Articles/Starships/Starships-Cover.jpg',
      'timeToRead' => '2 min'
    ],
    [
      'title' => 'Le Voyage',
      'intro' => 'Comment seront les 7 prochains mois de voyage',
      'coverImage' => '/images/Articles/Le-Voyage/Le-voyage-Cover.jpg',
      'timeToRead' => '3 min'
    ],
    [
      'title' => 'Mars',
      'intro' => 'Tout savoir sur notre nouvelle planète',
      'coverImage' => '/images/Articles/Mars/Mars-Cover.jpg',
      'timeToRead' => '2 min'
    ],
    [
      'title' => 'Vivre sur mars',
      'intro' => 'Comment sera votre nouvelle ville ?',
      'coverImage' => '/images/Articles/Vivre-sur-mars/Life-Cover.jpg',
      'timeToRead' => '3 min'
    ],
  ];

  private const SECTION_MUSK = [
    [
      'name' => 'Musk - 1) Introduction',
      'title' => 'Introduction',
      'image' => [
        '/images/Articles/Elon-Musk/Musk-Intro.jpg'
      ],
      'text' => [
        'Il est PDG de la société SpaceX et directeur général de la société Tesla, après avoir été président du conseil d\'administration de SolarCity et de Tesla. Il est aussi le fondateur de The Boring Company, une société de construction de tunnels, et de Neuralink, une société de neurotechnologie.',
        'Musk a déclaré que les objectifs de SolarCity, Tesla et SpaceX tournent autour de sa vision de changer le monde et l\'humanité. Ses buts incluent de réduire le réchauffement climatique par la production et la consommation d\'énergie durable et réduire le « risque de l\'extinction humaine » en créant une vie multi-planétaire par l\'établissement d\'une colonie humaine sur Mars.'
      ],
      'doubleMedia' => [],
    ],
    [
      'name' => 'Musk - 2) SpaceX',
      'title' => 'SpaceX',
      'image' => [
        '/images/Articles/Elon-Musk/Musk-Space.jpg'
      ],
      'text' => [
        'SpaceX est une entreprise américaine du domaine de l\'astronautique et du vol spatial, elle a été fondée le 6 mai 2002 par l\'entrepreneur Elon Musk. SpaceX, constructeur spécialisé dans l\'aérospatial, conçoit les lanceurs Falcon, les moteurs Merlin et Raptor ainsi que le vaisseau cargo Dragon qui assure le ravitaillement de la Station spatiale internationale (ISS).'
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Musk - 3) Pourquoi coloniser Mars ?',
      'title' => 'Pourquoi coloniser Mars ?',
      'image' => [],
      'text' => [
        'Cette idée de faire de l\'humanité une espèce interplanétaire n\'est pas une lubie. Chez Musk, il s\'agit simplement du « but de sa vie ». Elon Musk a toujours dit que c\'est la raison pour laquelle il a fondé SpaceX en 2002 et pourquoi il s\'est enrichi. Pour comprendre le raisonnement de Musk, il faut savoir qu\'il craint que « l\'humanité s\'apprête à vivre des jours sombres, voire à disparaître du fait de l\'avènement de l\'intelligence artificielle et de robots de plus en plus intelligents ». Concernant Mars, son but est d\'établir une colonie martienne pour préserver l\'humanité qui dans un premier temps dépendrait de la Terre pour « survivre », puis au fil des années deviendrait autonome et finirait vraisemblablement par faire sécession.'
      ],
      'doubleMedia' => []
    ],
  ];

  private const SECTION_STARSHIPS = [
    [
      'name' => 'Starships - 1) ITS',
      'title' => 'L’ITS (Interplanetary Transport System)',
      'image' => [],
      'text' => [
        "L'Interplanetary Transport System ou ITS (en français, Système de transport Interplanétaire) est un projet du constructeur aérospatial américain SpaceX dont l'objectif était de développer un lanceur lourd et un vaisseau spatial réutilisables permettant de déposer sur Mars un équipage d'une centaine de personnes. Le projet, qui serait développé grâce aux bénéfices dégagés par SpaceX et la fortune personnelle de son fondateur Elon Musk, prévoit à terme l'implantation d'une colonie permanente sur Mars.",
        "Pour aller sur Mars, SpaceX propose un système de transport interplanétaire en deux parties, c'est-à-dire qu'il comprend un étage principal (le booster) et le véhicule habité, ou sa version cargo. D'une hauteur de 122 mètres, il sera le plus grand jamais construit. Avec ses 42 moteurs Raptor, dont un est actuellement à l'essai au sol, il aura la capacité de lancer en orbite basse jusqu'à 550 tonnes (contre seulement 135 tonnes pour la Saturn V des missions Apollo et de 70 à 143 tonnes, selon la version, pour le Space Launch System, le lanceur lourd de la Nasa construit en 2018)."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Starships - 2) Les moteurs Raptor',
      'title' => 'Les moteurs Raptor',
      'image' => [],
      'text' => [
        "3 fois plus puissants que les moteurs des lanceurs Falcon 9. 42, les Raptors équiperont chaque lanceur, ce seront donc les lanceurs les plus puissants de l'Histoire. Jusqu'à 550 tonnes de charge utile pourront ainsi être placées en orbite basse. À titre de comparaison, les capacités de la célèbre Saturn V du programme Apollo étaient de 135 tonnes."
      ],
      'doubleMedia' => [
        "/images/Articles/Starships/Starships-Raptor.jpg",
        "https://www.youtube.com/embed/X2dEpe8WS1A"
      ]
    ],
    [
      'name' => 'Starships - 3) Les navettes Starship',
      'title' => 'Les navettes Starship',
      'image' => [
        "/images/Articles/Starships/Starships-Navettes.jpg"
      ],
      'text' => [
        "Le vaisseau spatial StarsX de SpaceX et la fusée Super Heavy (collectivement appelés Starship) représentent un système de transport entièrement réutilisable conçu pour transporter à la fois l'équipage et la cargaison sur l'orbite de la Terre, la Lune, Mars et au-delà. Le vaisseau spatial sera le lanceur le plus puissant au monde jamais développé, avec la capacité de transporter plus de 100 tonnes métriques sur orbite terrestre."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Starships - 4) Le décollage',
      'title' => 'Le décollage',
      'image' => [],
      'text' => [
        "Mille Starship seront nécessaires. Ils seront construits au rythme d'une centaine chaque année pendant 10 ans et chaque véhicule aura une durée de vie de 20 à 30 ans. Mille de ces véhicules devraient donc être en service d'ici 10 ans. Selon les plans de Musk, pour quitter la Terre et rejoindre Mars, l'enjeu est de lancer tous les Starship, alors en service, à destination de Mars, lors des fenêtres de tir qui s'ouvrent tous les 24 à 26 mois ! C'est-à-dire quand Mars et la Terre sont au plus près, de façon à rendre le voyage plus court (60 millions de kilomètres).",
        "Dans la version ITS, il est envisagé que le lanceur revienne se poser précisément à l'endroit choisi 20 minutes après avoir mis en orbite une navette. Il est noté qu'ils pourront être réutilisés jusqu'à 1.000 fois chacun... Peu à peu, une flotte de vaisseaux (habitées et cargo) sera constituée autour de la Terre. Puis, lorsque la route vers Mars sera favorable (une fenêtre s'ouvre tous les 26 mois), le convoi entamera sa croisière à 100.800 km/h."
      ],
      'doubleMedia' => [
        "/images/Articles/Starships/Starships-Decollage.jpg",
        "https://www.youtube.com/embed/0qo78R_yYFA"
      ]
    ]
  ];

  private const SECTION_VOYAGE = [
    [
      'name' => 'Le voyage - 1) Introduction',
      'title' => 'Introduction',
      'image' => [],
      'text' => [
        "227,937 millions de kilomètres séparent notre point de départ, la Terre, et notre nouvelle planète, Mars. Ainsi, les colons devront voyager pendant 7 mois à l’intérieur des navettes Starships. 7 mois de vie en communauté, période de transition entre son ancienne et sa nouvelle vie."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Le voyage - 2) Carte interne de la navette',
      'title' => 'Carte interne de la navette',
      'image' => [],
      'text' => [],
      'doubleMedia' => [
        "/images/Articles/Le-Voyage/Le-voyage-map.jpg",
        "https://www.youtube.com/embed/SQX3zcpOojQ"
      ]
    ],
    [
      'name' => 'Le voyage - 3) Organisation',
      'title' => 'Organisation',
      'image' => [
        "/images/Articles/Le-Voyage/Le-voyage-organisation.jpg"
      ],
      'text' => [
        "Chaque passager sera affecté à une petite chambre (familles et couples pouvant être regroupés) et des tâches quotidiennes propres à leur profession. Les enfants et adolescents continueront de suivre des cours dans notre école commune. Afin que la vie en communauté se déroule au mieux, chacun devra suivre la même routine et les même moeurs."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Le voyage - 4) Journée type',
      'title' => 'Journée type',
      'image' => [
        "/images/Articles/Le-Voyage/Le-voyage-daily.jpg"
      ],
      'text' => [
        "La journée de l’équipage des Starships s’étale de 6h du matin à 21h30. En plus des heures de travail ou d’école pour les mineurs, plusieurs heures sont consacrées à l’hygiène personnelle et au sport : en apesanteur, les états des muscles et des os s’affaiblissent car ils ne sont pas sollicités de la même manière que sur Terre. Les repas se font en commun dans le réfectoire, et chacun peut retourner dans sa chambre ou dans les parties communes pour se détendre à la fin de la journée."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Le voyage - 5) Hygiène et Santé',
      'title' => 'Hygiène et Santé',
      'image' => [],
      'text' => [
        "Les toilettes de la station spatiale sont en fait des aspirateurs. Un tuyau pour les hommes, un peu plus large pour les femmes, et encore plus large pour les selles. Les urines sont recyclées en eau, utilisées au sein de la station.",
        "Si on tombe malade : Prendre une aspirine effervescente dans la station spatiale est beaucoup plus compliqué, mais aussi beaucoup plus amusant. Il faut relâcher de l’eau à l’aide d’une pipette dans l’air et celle-ci se maintient dans l’espace en forme de boule. Ensuite, intégrez délicatement l’aspirine dans la bulle d’eau, attendez quelques instants que l’effervescence s’arrête. Gobez la boule. En cas d’urgence, rendez-vous directement à l’infirmerie."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Le voyage - 6) Nourriture',
      'title' => 'Nourriture',
      'image' => [],
      'text' => [
        "Enfin, il va falloir oublier tout ce qui est Miel Pops et coquillettes. Toute la nourriture utilisée doit être compacte pour éviter de salir les locaux. Ainsi, les préparations sont mixées sur Terre et mises dans des tubes. Grâce à cette technique, les passagers pourront avoir toute sortes de plats pour un régime équilibré : par exemple, il sera même possible d’avoir des pâtes carbonara pour le dîner... sous une autre forme."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Le voyage - 7) Événements',
      'title' => 'Événements',
      'image' => [
        "/images/Articles/Le-Voyage/Le-voyage-events.jpg"
      ],
      'text' => [
        "Pendant ces 7 mois, il n'est pas question de s'embêter à bord. La vie continue comme avant, et de nombreux événements sont prévus afin de rendre la vie la plus agréable possible. La liste des événements prévus à bord sont listé dans votre calendrier personnel."
      ],
      'doubleMedia' => []
    ]
  ];

  private const SECTION_MARS = [
    [
      'name' => 'Mars - 1) Introduction',
      'title' => 'Introduction',
      'image' => [],
      'text' => [
        "Le saviez-vous ? Pourquoi avoir choisi Mars et pas Vénus ou Mercure ? La raison est simple : Parce que la planète offre les conditions les plus supportables pour notre espèce, au contraire des deux autres planètes rocheuses qui sont trop proches du Soleil. Certes, la température à sa surface est actuellement trop basse mais nous pourrions la réchauffer, lui redonner une épaisse atmosphère. Une terraformation complète n’est cependant pas pour tout de suite. Autrement, un potager sur Mars, c’est possible, comme cela a été démontré."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Mars - 2) Les informations essentielles',
      'title' => 'Les informations essentielles',
      'image' => [
        "/images/Articles/Mars/Mars-Introduction.jpg"
      ],
      'text' => [
        "Quatrième planète du Système solaire, Mars est une planète tellurique, comme le sont Mercure, Vénus et la Terre. En opposition aux planètes gazeuses elle est donc composée essentiellement de roches et de métal et possède trois enveloppes concentriques (noyau, manteau et croûte). Sa surface est solide et composée principalement de matériaux non volatils, généralement des roches silicatées et du fer métallique. Mars a toujours été caractérisée visuellement par sa couleur rouge, due à l'abondance de l'hématite amorphe (oxyde de fer) à sa surface",
        "Mars possède deux petits satellites naturels, Phobos et Déimos."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Mars - 3) En comparaison avec la terre',
      'title' => 'En comparaison avec la terre',
      'image' => [
        "/images/Articles/Mars/Mars-Comparison.jpg"
      ],
      'text' => [
        "Moitié moins grande que la Terre et près de dix fois moins massive, la gravité y est le tiers de notre planète bleue, tandis que la durée du jour solaire martien, appelé sol, excède celui du jour terrestre d’un peu moins de 40 minutes.",
        "Mars est une fois et demie plus éloignée du Soleil que la Terre, sur une orbite sensiblement plus elliptique, et reçoit, selon sa position sur cette orbite, entre deux et trois fois moins d'énergie solaire que notre planète. L'atmosphère de Mars étant de surcroît plus de 150 fois moins dense que la nôtre, et ne produisant par conséquent qu'un effet de serre très limité, ce faible rayonnement solaire explique que la température moyenne sur Mars soit d'environ -65 °C. Une fois arrivés, le cycle jour nuit sera quasiment le même que sur Terre a 37 min près (24h37). Il y aura en revanche un changement assez conséquent pour le cycle annuel car une année sur mars dure 686 jours."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Mars - 4) Structure interne et géographie',
      'title' => 'Structure interne et géographie',
      'image' => [
        "/images/Articles/Mars/Mars-Structure.jpg"
      ],
      'text' => [
        "Sa topographie présente des analogies aussi bien avec la Lune, à travers ses cratères et ses bassins d'impact, qu'avec la Terre, avec des formations d'origine tectonique et climatique telles que des volcans, des rifts, des vallées, des mesas, des champs de dunes et des calottes polaires. Le plus haut volcan du Système solaire, Olympus Mons (qui est un volcan bouclier), et le plus grand canyon, Valles Marineris, se trouvent sur Mars."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Mars - 5) Carte de Mars',
      'title' => 'Carte de Mars',
      'image' => [
        "/images/Articles/Mars/Mars-Map.jpg"
      ],
      'text' => [],
      'doubleMedia' => []
    ],
  ];

  private const SECTION_VIVRE = [
    [
      'name' => 'Vivre sur Mars - 1) Introduction',
      'title' => 'Introduction',
      'image' => [
        "/images/Articles/Vivre-sur-mars/Life-Introduction.jpg"
      ],
      'text' => [
        "Si tant est que l’on arrive à coloniser la planète rouge, il faudra bel et bien y installer des lieux de vie : logements, cultures de fruits et légumes, divertissements, lieux de travail et de recherche, restaurants. Ces villes ne pourront pas exactement ressembler à ce que l’on connaît. Le fait est que Mars n’est clairement pas aussi accueillante que la Terre. Elle a une atmosphère très ténue ; les radiations seraient mortelles sans protection ; il peut y faire extrêmement froid ; de grandes et de longues tempêtes y surviennent. Une ville martienne habitée par des humains devra être capable de relever ces défis spatiaux."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Vivre sur Mars - 2) La ville',
      'title' => 'La ville',
      'image' => [
        "/images/Articles/Vivre-sur-mars/Life-New-Musk-city.jpg"
      ],
      'text' => [
        "Condition des plus essentielles dans cette entreprise, la ville proposée doit obéir au plus haut niveau d’autonomie possible, au sens d’une autosuffisance dans les ressources.",
        "Cela signifie qu’elle doit « se reposer sur une masse minimum d’importations depuis la Terre ». De fait, il faut pouvoir produire sur place des aliments, du verre, de l’acier, du plastique et des tissus, afin qu’il ne soit pas nécessaire d’importer de la nourriture, des vêtements, des abris, des véhicules et autres ingrédients de vie quotidienne. Tant que possible, tout doit se faire in situ. La Mars Society suggère donc que les forces de travail humaines soient complétées par l’utilisation de robots et même d’intelligences artificielles, en plus d’une technologie avancée d’impression 3D.",
        "La luminosité extérieure correspondant à 43 % de celle de la Terre, les équipes d’Elon Musk ont envisagé de doter les cabines des colons d’une installation de luminothérapie et d’un aquarium exotique pour limiter les risques de dépression."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Vivre sur Mars - 3) Les habitations',
      'title' => 'Les habitations',
      'image' => [],
      'text' => [
        "Le plus gros problème sur Mars sont les radiations, en raison d'une atmosphère trop faible qui ne protège pas assez des radiations solaires mais ce n'est pas un soucis avec les habitations martiennes. Trois types d’habitations seront proposées."
      ],
      'doubleMedia' => []
    ],
    [
      'name' => 'Vivre sur Mars - 4) Les cylindres apis cor',
      'title' => '1. Les cylindres Apis Cor',
      'image' => [],
      'text' => [],
      'doubleMedia' => [
        "/images/Articles/Vivre-sur-mars/Life-Apis-Cor.jpg",
        "https://www.youtube.com/embed/W4pxp5AGeNE"
      ]
    ],
    [
      'name' => 'Vivre sur Mars - 5) Les tentes Zopherus',
      'title' => '2. Les tentes Zopherus',
      'image' => [],
      'text' => [],
      'doubleMedia' => [
        "/images/Articles/Vivre-sur-mars/Life-Zopherus.jpg",
        "https://www.youtube.com/embed/2TLnCOCVicE"
      ]
    ],
    [
      'name' => 'Vivre sur Mars - 6) Les polyèdres Mars Incubator',
      'title' => '3. Les polyèdres Mars Incubator',
      'image' => [],
      'text' => [],
      'doubleMedia' => [
        "/images/Articles/Vivre-sur-mars/Life-Polyedres.jpg",
        "https://www.youtube.com/embed/nHxO-zmqdLM"
      ]
    ],
    [
      'name' => 'Vivre sur Mars - 7) Les combinaisons',
      'title' => 'Les combinaisons',
      'image' => [
        "/images/Articles/Vivre-sur-mars/Life-Combinaison.jpg"
      ],
      'text' => [
        "1. Des combinaisons ajustables",
        "Les combinaisons actuelles se composent en effet de plusieurs pièces pouvant s’assembler de manière variée. La société ILC Dover, connue pour avoir confectionné certaines combinaisons spatiales pour la NASA, vient en effet de présenter deux nouveaux modèles. L’une est baptisée Astro, l’autre Sol. La première est conçue pour les sorties extravéhiculaires et l’exploration de terrain, tandis que l’autre est conçue pour être portée à l’intérieur du vaisseau, lors des lancements et des atterrissages. L’avantage de ces deux nouvelles tenues, c’est qu’elles sont ajustables.",
        "2. Plus légères",
        "Autrement dit, il serait possible de modifier la taille de l’une ou l’autre de ces combinaisons pour que celle-ci puisse correspondre au corps de l’astronaute concerné. Mais ce n’est pas tout. Ces combinaisons seront également plus légères que les précédentes. Une bonne nouvelle donc, puisque dans l’espace, chaque kilo supplémentaire peut coûter des milliers d’euros. Le fait de perdre du poids au niveau des tenues permettrait d’en gagner au niveau de l’équipement scientifique, ou du carburant.",
        "3. Plus résistantes et plus pratiques",
        "D’autres améliorations ont également été apportées. La structure des chaussures pourra être modifiée pour s’adapter au terrain. La matière et les joints ont été repensés pour faciliter les mouvements et résister aux rudes conditions de l’espace. Les deux combinaisons offrent également une meilleure visibilité au niveau casque. Nous savons en effet que c’était l’un des gros problèmes pour les membres des missions Apollo, qui ne pouvaient pas voir leurs pieds."
      ],
      'doubleMedia' => []
    ],
  ];

  public function loadArticles(ObjectManager $manager)
  {
    foreach(self::ARTICLES as $articleFixture)
    {
      $article = new Articles();
      $article->setTitle($articleFixture['title']);
      $article->setIntro($articleFixture['intro']);
      $article->setCoverImage($articleFixture['coverImage']);
      $article->setTimeToRead($articleFixture['timeToRead']);

      $this->addReference($articleFixture['title'], $article);

      $manager->persist($article);
    }
    $manager->flush();

  }

  public function loadSection(ObjectManager $manager)
  {
    foreach(self::SECTION_MUSK as $articleMuskFixture)
    {
      $section = new Section();
      $section->setName($articleMuskFixture['name']);
      $section->setTitle($articleMuskFixture['title']);
      $section->setImage($articleMuskFixture['image']);
      $section->setText($articleMuskFixture['text']);
      $section->setDoubleMedia($articleMuskFixture['doubleMedia']);
      $section->setArticle($this->getReference('Elon Musk'));

      $manager->persist($section);
    }

    foreach(self::SECTION_STARSHIPS as $articleStarshipsFixture)
    {
      $section = new Section();
      $section->setName($articleStarshipsFixture['name']);
      $section->setTitle($articleStarshipsFixture['title']);
      $section->setImage($articleStarshipsFixture['image']);
      $section->setText($articleStarshipsFixture['text']);
      $section->setDoubleMedia($articleStarshipsFixture['doubleMedia']);
      $section->setArticle($this->getReference('Starships'));

      $manager->persist($section);
    }

    foreach(self::SECTION_VOYAGE as $articleVoyageFixture)
    {
      $section = new Section();
      $section->setName($articleVoyageFixture['name']);
      $section->setTitle($articleVoyageFixture['title']);
      $section->setImage($articleVoyageFixture['image']);
      $section->setText($articleVoyageFixture['text']);
      $section->setDoubleMedia($articleVoyageFixture['doubleMedia']);
      $section->setArticle($this->getReference('Le Voyage'));

      $manager->persist($section);
    }

    foreach(self::SECTION_MARS as $articleMarsFixture)
    {
      $section = new Section();
      $section->setName($articleMarsFixture['name']);
      $section->setTitle($articleMarsFixture['title']);
      $section->setImage($articleMarsFixture['image']);
      $section->setText($articleMarsFixture['text']);
      $section->setDoubleMedia($articleMarsFixture['doubleMedia']);
      $section->setArticle($this->getReference('Mars'));

      $manager->persist($section);
    }

    foreach(self::SECTION_VIVRE as $articleVivreFixture)
    {
      $section = new Section();
      $section->setName($articleVivreFixture['name']);
      $section->setTitle($articleVivreFixture['title']);
      $section->setImage($articleVivreFixture['image']);
      $section->setText($articleVivreFixture['text']);
      $section->setDoubleMedia($articleVivreFixture['doubleMedia']);
      $section->setArticle($this->getReference('Vivre sur mars'));

      $manager->persist($section);
    }

    $manager->flush();
  }
}