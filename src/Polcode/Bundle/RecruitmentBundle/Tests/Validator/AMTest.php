<?php
namespace Polcode\Bundle\RecruitmentBundle\Tests\Validator;

use Polcode\Bundle\RecruitmentBundle\Entity\AM;
use Symfony\Component\Validator\Validation;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class AMTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Validator
 */
class AMTest extends WebTestCase
{

    public function testEmptyAll()
    {
        $entity = new AM();
        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertGreaterThan(0, count($errors));
    }

    public function testEmptyFirstName()
    {
        $entity = new AM();

        $entity->setEmail('email@polcode.net')
               ->setLastName('Lastname');

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyLastnameName()
    {
        $entity = new AM();

        $entity->setEmail('email@polcode.net')
            ->setFirstName('Firstname');

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyEmail()
    {
        $entity = new AM();

        $entity->setLastName('Lastname')
            ->setFirstName('Firstname');

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);

        $this->assertEquals(1, count($errors));

    }

    public function testValidEmail()
    {
        $entity = new AM();

        $entity->setLastName('Lastname')
            ->setFirstName('Firstname')
            ->setEmail('email@polcode.net');

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(0, count($errors));

    }

    public function testWrongEmail()
    {
        $entity = new AM();

        $entity->setLastName('Lastname')
            ->setFirstName('Firstname')
            ->setEmail('email');

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }


}