<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Skill;

class SkillsFixtures extends Fixture
{
	private Generator $faker;

	public function __construct()
	{
		$this->faker = Factory::create('fr_FR');
	}

	public function load(ObjectManager $manager): void
	{
		for ($i=1; $i <= 50; $i++) { 
			$skill = new Skill();
			$skill->setName($this->faker->sentence(5));
			$manager->persist($skill);
		}
		$manager->flush();
	}
}

