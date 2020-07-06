<?php


namespace App\DataFixtures;


use App\Entity\Calendar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CalendarFixture extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $this->loadCalendar($manager);
  }

  public const CALENDAR = [
    [
      'title' => '1ère Réunion de l’Exodus',
      'type' => 'Obligatoire',
      'date' => '05/02/2020',
      'startTime' => '19:00',
      'endTime' => '23:30'
    ],
    [
      'title' => '1er Entraînement physique',
      'type' => 'Obligatoire',
      'date' => '05/09/2020',
      'startTime' => '14:00',
      'endTime' => '18:00'
    ],
    [
      'title' => 'Formation en notions de survie',
      'type' => 'Facultatif',
      'date' => '05/18/2020',
      'startTime' => '09:00',
      'endTime' => '13:00'
    ],
    [
      'title' => 'Entraînement physique',
      'type' => 'Obligatoire',
      'date' => '05/23/2020',
      'startTime' => '14:00',
      'endTime' => '18:00'
    ],
    [
      'title' => 'Conférence de Presse à Paris',
      'type' => 'Facultatif',
      'date' => '05/27/2020',
      'startTime' => '18:30',
      'endTime' => '20:00'
    ],
    [
      'title' => 'Formation sur la géographie martienne',
      'type' => 'Facultatif',
      'date' => '06/01/2020',
      'startTime' => '09:00',
      'endTime' => '13:00'
    ],
    [
      'title' => 'Formation en notions de survie',
      'type' => 'Obligatoire',
      'date' => '06/05/2020',
      'startTime' => '20:00',
      'endTime' => '22:00'
    ],
    [
      'title' => 'Entraînement physique',
      'type' => 'Obligatoire',
      'date' => '06/06/2020',
      'startTime' => '14:00',
      'endTime' => '18:00'
    ],
    [
      'title' => '1er Entraînement en apesanteur',
      'type' => 'Obligatoire',
      'date' => '06/12/2020',
      'startTime' => '20:00',
      'endTime' => '22:00'
    ],
    [
      'title' => 'Conférence de Presse à NYC',
      'type' => 'Facultatif',
      'date' => '06/17/2020',
      'startTime' => '18:30',
      'endTime' => '20:00'
    ],
    [
      'title' => 'Examen médical',
      'type' => 'Alerte',
      'date' => '06/22/2020',
      'startTime' => '14:30',
      'endTime' => '19:00'
    ],
    [
      'title' => 'Examen psychologique',
      'type' => 'Alerte',
      'date' => '06/25/2020',
      'startTime' => '14:30',
      'endTime' => '19:00'
    ],
    [
      'title' => 'Entraînement physique',
      'type' => 'Obligatoire',
      'date' => '06/20/2020',
      'startTime' => '14:00',
      'endTime' => '18:00'
    ],
    [
      'title' => 'Entraînement en apesanteur',
      'type' => 'Obligatoire',
      'date' => '06/26/2020',
      'startTime' => '20:00',
      'endTime' => '22:00'
    ],
    [
      'title' => 'Conférence de Presse à Tokyo',
      'type' => 'Facultatif',
      'date' => '07/10/2020',
      'startTime' => '19:00',
      'endTime' => '22:30'
    ],
    [
      'title' => 'Décollage et Grand Départ',
      'type' => 'Alerte',
      'date' => '07/12/2020',
      'startTime' => '09:00',
      'endTime' => '18:00'
    ],
    [
      'title' => 'Journée d’accueil dans les navettes',
      'type' => 'Obligatoire',
      'date' => '07/11/2020',
      'startTime' => '09:30',
      'endTime' => '16:30'
    ],
    [
      'title' => '1ère soirée de l’Exodus',
      'type' => 'Facultatif',
      'date' => '07/17/2020',
      'startTime' => '18:30',
      'endTime' => '23:30'
    ],
    [
      'title' => 'Traversée d’une zone de turbulences',
      'type' => 'Alerte',
      'date' => '07/17/2020',
      'startTime' => '14:00',
      'endTime' => '16:00'
    ],
    [
      'title' => 'Observations des Perséides',
      'type' => 'Facultatif',
      'date' => '08/13/2020',
      'startTime' => '19:00',
      'endTime' => '22:30'
    ],
    [
      'title' => 'Noël à bord des navettes',
      'type' => 'Facultatif',
      'date' => '12/25/2020',
      'startTime' => '18:30',
      'endTime' => '23:30'
    ],
    [
      'title' => 'Nouvel an dans l’espace',
      'type' => 'Facultatif',
      'date' => '01/01/2021',
      'startTime' => '18:30',
      'endTime' => '23:30'
    ],
    [
      'title' => 'Soirée célibataires',
      'type' => 'Facultatif',
      'date' => '02/14/2021',
      'startTime' => '18:30',
      'endTime' => '23:30'
    ],
    [
      'title' => 'Dernière soirée à bord',
      'type' => 'Facultatif',
      'date' => '04/04/2021',
      'startTime' => '18:30',
      'endTime' => '23:30'
    ],
    [
      'title' => 'Atterrissage sur Mars',
      'type' => 'Alerte',
      'date' => '04/05/2021',
      'startTime' => '05:30',
      'endTime' => '15:00'
    ],
    [
      'title' => 'Transfert jusqu’à New Musk City',
      'type' => 'Obligatoire',
      'date' => '04/06/2021',
      'startTime' => '09:00',
      'endTime' => '13:00'
    ],
    [
      'title' => '1ères communications vers la Terre',
      'type' => 'Facultatif',
      'date' => '04/08/2021',
      'startTime' => '18:00',
      'endTime' => '22:00'
    ],
    [
      'title' => 'Jours Banalisés',
      'type' => 'Obligatoire',
      'date' => '04/09/2021',
      'startTime' => '09:00',
      'endTime' => '00:00'
    ],

    [
      'title' => 'Fin des jours banalisés',
      'type' => 'Obligatoire',
      'date' => '05/03/2021',
      'startTime' => '09:00',
      'endTime' => '00:00'
    ],
    [
      'title' => 'Première plantations',
      'type' => 'Facultatif',
      'date' => '05/06/2021',
      'startTime' => '09:00',
      'endTime' => '00:00'
    ],
    [
      'title' => 'Exercice anti-incendie',
      'type' => 'Alerte',
      'date' => '05/18/2021',
      'startTime' => '17:30',
      'endTime' => '18:30'
    ],
    [
      'title' => 'Facultatif',
      'type' => 'Obligatoire',
      'date' => '05/31/2021',
      'startTime' => '04:00',
      'endTime' => '19:30'
    ],

  ];

  protected function loadCalendar(ObjectManager $manager)
  {
    foreach(self::CALENDAR as $calendarFixture)
    {
      $calendar = new Calendar();
      $calendar->setTitle($calendarFixture['title']);
      $calendar->setType($calendarFixture['type']);
      $calendar->setDate(new \DateTime($calendarFixture['date']));
      $calendar->setStartTime(new \DateTime($calendarFixture['startTime']));
      $calendar->setEndTime(new \DateTime($calendarFixture['endTime']));

      $manager->persist($calendar);
    }

    $manager->flush();
  }
}