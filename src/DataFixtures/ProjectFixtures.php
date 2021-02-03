<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    /**
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Persistence object manager.
     *
     * @var \Doctrine\Persistence\ObjectManager
     */
    protected $manager;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $this ->faker = Factory::create();
        $this->manager = $manager;
        // $product = new Product();
        // $manager->persist($product);

        for ($i=0; $i<20;$i++){
            $project = new Project();
            $project->setName($this->faker->word);
            $project->setCreatedAt($this->faker->dateTimeBetween('-10 years','now'));
            $project->setFinalDate($this->faker->dateTimeBetween('now','+10 years'));
            $manager->persist($project);
        }


        $manager->flush();
    }
}
