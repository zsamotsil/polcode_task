<?php
/**
 * Created by PhpStorm.
 * User: tworzenieweb
 * Date: 11.08.14
 * Time: 19:29
 */

namespace Polcode\Bundle\RecruitmentBundle\Tests\Admin\Access;


use FOS\UserBundle\Doctrine\UserManager;
use Liip\FunctionalTestBundle\Test\WebTestCase;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\ApplicationTester;
use Symfony\Component\Console\Output\Output;

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

        $this->assertTrue($crawler->filter('html:contains("Witaj programisto!")')->count() > 0);

    }

    public function testHRLogin()
    {

        $this->loadFixtures(array(
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadUserData',
                'Polcode\Bundle\RecruitmentBundle\DataFixtures\ORM\LoadProjectData'
        ));

        $hr = $this->userManager->findUserByUsername('hr');

        $this->assertNotNull($hr, "W bazie brakuje użytkownika HR");

        $this->loginAs($hr, 'user');

        $client = $this->makeClient();

        $crawler = $client->request('GET', '/admin/dashboard');

        $this->assertTrue($crawler->filter('<span>Recruitment</span>")')->count() > 0);

    }


}