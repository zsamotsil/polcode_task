<?php
namespace Polcode\Bundle\RecruitmentBundle\Tests\Validator;

use Polcode\Bundle\RecruitmentBundle\Entity\AM;
use Polcode\Bundle\RecruitmentBundle\Entity\Project;
use Symfony\Component\Validator\Validation;
use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Class ProjectTest
 * @package Polcode\Bundle\RecruitmentBundle\Tests\Validator
 */
class ProjectTest extends WebTestCase
{

    public function testEmptyAll()
    {
        $entity = new Project();
        $validator = $this->getContainer()->get('validator');

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
        $entity->setAm(new AM());
        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));

    }

    public function testMandatoryIsInternal()
    {
        $entity = new Project();
        $entity->setName('Some proj');
        $entity->setCreatedAt(new \DateTime());
        $entity->setEndAt(new \DateTime('+5 months'));
        $entity->setAm(new AM());
        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);
        $this->assertEquals(1, count($errors));
    }

    public function testAllGood()
    {
        $entity = new Project();
        $entity->setName('Some proj');
        $entity->setCreatedAt(new \DateTime());
        $entity->setEndAt(new \DateTime('+5 months'));
        $entity->setIsInternal(false);
        $entity->setAm(new AM());
        $validator = $this->getContainer()->get('validator');

        $errors = $validator->validate($entity);

        $this->assertEquals(0, count($errors));
    }


}