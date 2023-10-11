<?php

namespace App\DataFixtures;


use App\Entity\Movie;
use App\Entity\Room;
use App\Entity\Schedule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        $rooms = [];
        $schedules = [];
        $moovies = [];

        for ($i = 0; $i < 10; $i++){
            $moovies[$i] = new Movie();
            $moovies[$i]->setTitle($faker->sentence);
            $moovies[$i]->setDuration($faker->dateTime);
            $moovies[$i]->setProducer($faker->name);

            $manager->persist($moovies[$i]);
        }

        for ($i = 0; $i < 10; $i++){
            $schedules[$i] = new Schedule();
            $schedules[$i]->setHour($faker->dateTime);
            $schedules[$i]->setDate($faker->dateTime);
            $schedules[$i]->setMovies($moovies[array_rand($moovies)]);

            $manager->persist($schedules[$i]);
        }

        for ($i = 0; $i < 10; $i++){
            $rooms[$i] = new Room();
            $rooms[$i]->setName($faker->firstName);
            $rooms[$i]->setCapacity($faker->randomDigit());
            $rooms[$i]->setLocation($faker->address);
            $rooms[$i]->setMovie($moovies[array_rand($moovies)]);

            $manager->persist($rooms[$i]);
        }

        $manager->flush();
    }
}
