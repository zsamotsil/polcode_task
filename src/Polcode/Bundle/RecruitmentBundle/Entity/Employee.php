<?php

namespace Polcode\Bundle\RecruitmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Polcode\Bundle\RecruitmentBundle\Entity\AM;
use Polcode\Bundle\RecruitmentBundle\Entity\Project;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Employee
 */
class Employee
{
    /**
     * @ManyToOne(targetEntity="Polcode\Bundle\RecruitmentBundle\Entity\AM")
     * @JoinColumn(name="amId", referencedColumnName="id")
     **/
    private $am;
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $firstName;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $lastName;

    /**
     * @var string
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * get AM
     *
     * @return Polcode\Bundle\RecruitmentBundle\Entity\AM
     */
    public function getAm()
    {
        return $this->am;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projects;

    /**
     * Get projects
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjects() {
        return $this->projects;
    }
    
    /**
     * Add project
     *
     * @param Polcode\Bundle\RecruitmentBundle\Entity\Project $project
     * @return Project
     */
    public function addProject( Polcode\Bundle\RecruitmentBundle\Entity\Project $project ) {
        $this->projects[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param Polcode\Bundle\RecruitmentBundle\Entity\Project $project
     */
    public function removeProject( Polcode\Bundle\RecruitmentBundle\Entity\Project $project ) {
        $this->projects->removeElement( $project );
    }
    
    /**
     * Set am
     *
     * @param Polcode\Bundle\RecruitmentBundle\Entity\AM $am
     * @return Project
     */
    public function addAM( Polcode\Bundle\RecruitmentBundle\Entity\AM $am ) {
        $this->am = $am;

        return $this;
    }
    
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->projects = new \Doctrine\Common\Collections\ArrayCollection;
        //set first as internal
        $this->projects[0] = new Polcode\Bundle\RecruitmentBundle\Entity\Project;
        $this->projects[0]->setIsInternal(true);     
    }
}
