<?php

namespace Polcode\Bundle\RecruitmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Polcode\Bundle\RecruitmentBundle\Entity\AM;

/**
 * Project
 */
class Project
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
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $endAt;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;
    
    /**
     * @var boolean
     */
    private $isInternal;

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
     * Set name
     *
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    
    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     * @return Project
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }
    
    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Project
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }
    
    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Project
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime 
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set isInternal
     *
     * @param boolean $isInternal
     * @return Project
     */
    public function setIsInternal($isInternal)
    {
        $this->isInternal = $isInternal;

        return $this;
    }

    /**
     * Get isInternal
     *
     * @return boolean 
     */
    public function getIsInternal()
    {
        return $this->isInternal;
    }
    
    public function __construct() {
        //initial date if null
        $this->startDate = date('Y-m-d H:i:s');
    }
    
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
     * Set am
     *
     * @param Polcode\Bundle\RecruitmentBundle\Entity\AM $am
     * @return Project
     */
    public function addAM( Polcode\Bundle\RecruitmentBundle\Entity\AM $am ) {
        $this->am = $am;

        return $this;
    }
}
