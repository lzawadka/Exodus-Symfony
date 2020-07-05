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
      'title' => 'Annonce importante',
      'type' => 'Alerte',
      'date' => '12/05/2060'
    ],
    [
      'title' => 'Examen psychologique',
      'type' => 'Obligatoire',
      'date' => '12/05/2060'
    ],
    [
      'title' => 'Entraînement physique',
      'type' => 'Obligatoire',
      'date' => '12/05/2060'
    ],
    [
      'title' => 'Entraînement en apesanteur',
      'type' => 'Obligatoire',
      'date' => '12/05/2060'
    ],
    [
      'title' => 'Conférence de presse à NYC',
      'type' => 'Facultatif',
      'date' => '12/05/2060'
    ],
  ];

  protected function loadCalendar(ObjectManager $manager)
  {
    foreach(self::CALENDAR as $calendarFixture)
    {
      $calendar = new Calendar();
      $calendar->setTitle($calendarFixture['title']);
      $calendar->setType($calendarFixture['type']);
      $calendar->setDate($calendarFixture['date']);
      $calendar->setStartTime(new \DateTime('11:00'));
      $calendar->setEndTime(new \DateTime('12:00'));

      $manager->persist($calendar);
    }

    $manager->flush();
  }
}