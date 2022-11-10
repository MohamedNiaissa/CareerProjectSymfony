<?php

namespace App\DataFixtures;

use Cassandra\Set;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\Candidate;
use App\Entity\User;

class CandidateFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 10; $i++) {
            // $candidates = new Candidate(new User());

            // $candidates->setName($this->faker->name());
            // $candidates->SetAge($this->faker->randomDigit());
            // $candidates->SetPicture($this->faker->sentence(1));
            // $candidates->SetEmail($this->faker->email());
            // $manager->persist($candidates);
        }
        $manager->flush();
    }
}
