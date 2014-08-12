<?php
namespace Polcode\Bundle\RecruitmentBundle\Tests\Validator;

use Polcode\Bundle\RecruitmentBundle\Entity\AM;
use Polcode\Bundle\RecruitmentBundle\Entity\Employee;
use Polcode\Bundle\RecruitmentBundle\Entity\Project;
use Symfony\Component\Validator\Validation;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class EmployeeTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Validator
 */
class EmployeeTest extends WebTestCase {

    public function testEmptyAll()
    {
        $entity = new Employee();
        $validator = $this->getContainer()->get('validator');
        
        $errors = $validator->validate($entity);

        $this->assertGreaterThan(0, count($errors));
    }
    
    public function testEmptyFirstName()
    {
        $entity = new Employee();

        $entity->setEmail('email@polcode.net')
               ->setLastName('Lastname')
               ->addProject(new Project())
               ->setAm(new AM());

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyLastnameName()
    {
        $entity = new Employee();

        $entity->setEmail('email@polcode.net')
               ->setFirstName('Firstname')
                ->addProject(new Project())
                ->setAm(new AM());

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname')
               ->addProject(new Project())
               ->setAm(new AM());

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testValidEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname')
               ->setEmail('email@polcode.net')
               ->addProject(new Project())
               ->setAm(new AM());

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(0, count($errors));

    }

    public function testWrongEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname')
               ->setEmail('email')
               ->addProject(new Project())
               ->setAm(new AM());;

        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }


}