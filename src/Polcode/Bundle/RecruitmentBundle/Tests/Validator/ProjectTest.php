<?php
namespace Polcode\Bundle\RecruitmentBundle\Tests\Validator;

use Polcode\Bundle\RecruitmentBundle\Entity\Project;
use Symfony\Component\Validator\Validation;

/**
 * Class ProjectTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Validator
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{

    public function testEmptyAll()
    {
        $entity = new Project();
        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertGreaterThan(0, count($errors));
    }

    public function testStartDateLessThanEndDate()
    {

        $date = new \DateTime();
        $entity = new Project();
        $entity->setName('Some proj');
        $entity->setIsInternal(false);
        $entity->setEndAt($date);
        $entity->setCreatedAt($date);
        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testMandatoryIsInternal()
    {
        $entity = new Project();
        $entity->setName('Some proj');
        $entity->setCreatedAt(new \DateTime());
        $entity->setEndAt(new \DateTime('+5 months'));
        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));
    }

    public function testAllGood()
    {
        $entity = new Project();
        $entity->setName('Some proj');
        $entity->setCreatedAt(new \DateTime());
        $entity->setEndAt(new \DateTime('+5 months'));
        $entity->setIsInternal(true);
        $validator = Validation::createValidatorBuilder()->getValidator();

        $errors = $validator->validate($entity);
        $this->assertEquals(0, count($errors));
    }


}