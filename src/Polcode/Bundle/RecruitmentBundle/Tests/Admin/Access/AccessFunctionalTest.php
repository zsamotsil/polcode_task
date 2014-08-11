<?php

namespace Polcode\Bundle\RecruitmentBundle\Tests\Admin\Access;


use FOS\UserBundle\Doctrine\UserManager;
use Liip\FunctionalTestBundle\Test\WebTestCase;


/**
 * Class AccessFunctionalTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Admin\Access
 */
class AccessFunctionalTest extends WebTestCase
{

    /**
     * @var UserManager
     *
     */
    private $userManager;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->userManager = $this->getContainer()->get('fos_user.user_manager');
    }

    public function testLoginAdmin()
    {

        $this->loadFixtures(array(
            'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadUserData',
            'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadProjectData'
        ));

        $admin = $this->userManager->findUserByUsername('admin');

        $this->loginAs($admin, 'user');

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/admin/dashboard');

        $content1 = $this->fetchContent('/admin/polcode/recruitment/employee/list', false, true);

        $content2 = $this->fetchContent('/admin/polcode/recruitment/am/list', false, true);

        $content2 = $this->fetchContent('/admin/polcode/recruitment/project/list', false, true);

    }

    public function testSonataUserCanLogin()
    {
        $this->loadFixtures(array(
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadUserData',
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadProjectData'
            ));

        $user = $this->userManager->findUserByUsername('user');

        $this->assertNotNull($user, "W bazie brakuje użytkownika user");

        $this->loginAs($user, 'user');

        $client = $this->makeClient();

        $content1 = $client->request("GET",'/admin/polcode/recruitment/employee/list');

        $this->assertEquals(403, $client->getResponse()->getStatusCode());

        $content2 = $client->request("GET", '/admin/polcode/recruitment/am/list');

        $this->assertEquals(403, $client->getResponse()->getStatusCode());

        $content2 = $client->request("GET", '/admin/polcode/recruitment/project/list');

        $this->assertEquals(403, $client->getResponse()->getStatusCode());


    }

    public function testHRLogin()
    {

        $this->loadFixtures(array(
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadUserData',
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadProjectData'
        ));

        $hr = $this->userManager->findUserByUsername('hr');

        $this->assertNotNull($hr, "W bazie brakuje użytkownika hr");

        $this->loginAs($hr, 'user');

        $client = $this->makeClient();

        $content1 = $this->fetchContent('/admin/polcode/recruitment/employee/list', false, true);

        $content2 = $this->fetchContent('/admin/polcode/recruitment/am/list', false, true);

        $content2 = $this->fetchContent('/admin/polcode/recruitment/project/list', false, true);

    }


}