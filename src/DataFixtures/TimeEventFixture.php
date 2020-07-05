<?php


namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TimeEvent;

class TimeEventFixture extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $this->loadTimeEvent($manager);
  }

  public const TIMEEVENT = [
    [
      'title' => 'Expédition Olympus MONS I',
      'text' => 'Expédition pour installer un camp de base et d\'observation au pied d\'Olympus Mons, le plus grand volcan de Mars culminant à plus de 21 000 mètres d’altitude.',
      'picture' => '/images/Timeline/TimelineEvent-9.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Jours banalisés pour les nouveaux arrivants',
      'text' => '"Vacances" durant lesquelles les nouveaux arrivant pourront librement prendre leurs habitudes sur leur nouvelle planète, explorer, avant de démarrer leur nouveau travail',
      'picture' => '/images/Timeline/TimelineEvent-8.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Atterrissage des navettes',
      'text' => 'Nous atterrirons sur Mars au petit matin.  Les passagers devront quitter leurs appartements, enfiler leurs tenues, préparer leurs valises. Ils seront directement amenés dans leur nouvelle habitation. Cérémonie de bienvenue en fin de soirée, suivie de plus',
      'picture' => '/images/Timeline/TimelineEvent-7.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Nouvel An 2061 dans l’espace',
      'text' => 'Nous célébrerons ensemble cette nouvelle année 2061 à bord des Starships. Une grande fête sera prévue en intérieur, et les passagers pourront également contempler l’espace à l’extérieur de la navette. Tenue adaptée et matériel de sécurité obligatoires.',
      'picture' => '/images/Timeline/TimelineEvent-6.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Première soirée de l’Exodus',
      'text' => 'Afin de célébrer le lancement de cette aventure, nous organiserons une grande soirée à bord des navette la semaine après le décollage, après que chacun ait pris ses aises dans leur nouvelle maison',
      'picture' => '/images/Timeline/TimelineEvent-5.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Décollage et départ',
      'text' => 'C’est le grand départ ! Vous allez embarquer à bord de votre navette Starship pour 7 mois d’aventure avant le début de votre nouvelle vie ! Vous avez rendez-vous dans le Kennedy Space Center où l’on vous préparera pour le décollage. Plus d’informations su',
      'picture' => '/images/Timeline/TimelineEvent-4.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Conférence de Presse à NYC',
      'text' => 'À New-York, vous allez participer à une conférence de presse afin de répondre à toutes les questions concernant votre prise en charge par SpaceX et votre voyage. Vous serez les premiers à participer à cette aventure unique, ce sera l’occasion de partager',
      'picture' => '/images/Timeline/TimelineEvent-3.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Entraînements en apesanteur',
      'text' => 'Vous allez vivre plusieurs mois à bord du vaisseau Starship, il est donc primordial que vous appreniez à évoluer dans ce nouvel environnement. Vous allez apprendre à vous déplacer, vous nourrir, utiliser votre combinaison et respecter les mesures de sécurité',
      'picture' => '/images/Timeline/TimelineEvent-2.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
    [
      'title' => 'Début des entraînements physiques',
      'text' => 'Afin de vous préparer au mieux à votre départ sur Mars, vous allez suivre une multitude d’entraînements physiques. Nous allons d’abord évaluer vos performances, puis nous adapterons nos entraînements en fonction de vos résultats.',
      'picture' => '/images/Timeline/TimelineEvent-1.png',
      'buttonLabel' => 'Accéder au calendrier',
      'buttonUrl' => 'Button Url',
      'Date' => '11/05/2060'
    ],
  ];

  protected function loadTimeEvent(ObjectManager $manager)
  {
    foreach(self::TIMEEVENT as $timeEventFixture)
    {
      $timeEvent = new TimeEvent();
      $timeEvent->setTitle($timeEventFixture['title']);
      $timeEvent->setText($timeEventFixture['text']);
      $timeEvent->setPicture($timeEventFixture['picture']);
      $timeEvent->setButtonLabel($timeEventFixture['buttonLabel']);
      $timeEvent->setButtonUrl($timeEventFixture['buttonUrl']);
      $timeEvent->setDate($timeEventFixture['Date']);

      $manager->persist($timeEvent);
    }
    $manager->flush();
  }
}