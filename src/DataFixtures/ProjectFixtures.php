<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class TaskFixtures.
 */
class ProjectFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(1, 'projects', function ($i) {
            $project = new Project();
            $project->setName($this->faker->word);
            $project->setCreatedAt($this->faker->dateTimeBetween('-10 years','now'));
            $project->setFinalDate($this->faker->dateTimeBetween('now','+10 years'));




            $project->setAuthor($this->getRandomReference('users'));

            return $project;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}