<?php
namespace Polcode\Bundle\RecruitmentBundle\Tests\Validator;

use Polcode\Bundle\RecruitmentBundle\Entity\Employee;
use Symfony\Component\Validator\Validation;

/**
 * Class EmployeeTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Validator
 */
class EmployeeTest extends \PHPUnit_Framework_TestCase {

    public function testEmptyAll()
    {
        $entity = new Employee();
        $validator = Validation::createValidatorBuilder()->getValidator();
        
        $errors = $validator->validate($entity);
        $this->assertGreaterThan(0, count($errors));
    }
    
    public function testEmptyFirstName()
    {
        $entity = new Employee();

        $entity->setEmail('email@polcode.net')
               ->setLastName('Lastname');

        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyLastnameName()
    {
        $entity = new Employee();

        $entity->setEmail('email@polcode.net')
               ->setFirstName('Firstname');

        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testEmptyEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname');

        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testValidEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname')
               ->setEmail('email@polcode.net');

        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(0, count($errors));

    }

    public function testWrongEmail()
    {
        $entity = new Employee();

        $entity->setLastName('Lastname')
               ->setFirstName('Firstname')
               ->setEmail('email');

        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }


}