<?php

namespace App\DataFixtures;

use App\Entity\Apartment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class ApartmentFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('pl_PL');
    }

    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 1000; $i++) {
            $apartment = new Apartment(
                $this->faker->streetAddress,
                $this->faker->city,
                $this->faker->postcode,
                'Poland',
                $this->faker->year,
                $this->faker->randomFloat(2, 20, 200)
            );

            $manager->persist($apartment);
        }

        $manager->flush();
    }
}
