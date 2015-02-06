<?php

namespace Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    function getOrder()
    {
        return 1;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $manager = $this->getUserManager();

        $user = $manager->createUser();
        $user->setUsername('admin');
        $user->setEmail('admin@polcode.pl');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setSuperAdmin(true);
        $user->setLocked(false);

        $manager->updateUser($user);

        // normal admin user
        $user = $manager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@polcode.pl');
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $user->addRole('ROLE_SONATA_ADMIN');
        $user->setLocked(false);

        $manager->updateUser($user);

        // add hr user here
        
        $user = $manager->createUser();
        $user->setUsername('hr');
        $user->setEmail('hr@polcode.pl');
        $user->setPlainPassword('hr');
        $user->setEnabled(true);
        $user->addRole('ROLE_SONATA_ADMIN');
        $user->setLocked(false);

        $manager->updateUser($user);
    }

    /**
     * @return \FOS\UserBundle\Model\UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->container->get('fos_user.user_manager');
    }
}