<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * @var
     */
    protected $faker;

    /**
     * @var \Doctrine\Persistence\ObjectManager $manager
     */
    protected $manager;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();
        $this->manager = $manager;
        for ($i=0; $i < 20; $i++) {
            $project = new Project();
            $project->setName('project'.$i);
            $project->setCreatedAt($this->faker->dateTimeBetween('-30 years','-1 days'));
            $project->setCreatedAt($this->faker->dateTimeBetween('now', '+10 years'));
        }

        $manager->flush();
    }
}
