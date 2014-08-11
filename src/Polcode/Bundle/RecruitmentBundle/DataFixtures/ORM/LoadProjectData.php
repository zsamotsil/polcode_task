<?php

namespace Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Polcode\Bundle\RecruitmentBundle\Entity\Project;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{

    function getOrder()
    {
        return 2;
    }

    public function load(ObjectManager $manager)
    {

        $internal = new Project();
        $internal->setName('INTERNAL');
        $internal->setCreatedAt(new \DateTime());
        $internal->setIsInternal(true);

        $manager->persist($internal);

        for ($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->setName('Project' . ($i+1));
            $project->setCreatedAt(new \DateTime());
            $project->setEndAt(new \DateTime('+6 months'));
            $project->setIsInternal(false);

            $manager->persist($project);
        }

        $manager->flush();


    }
}