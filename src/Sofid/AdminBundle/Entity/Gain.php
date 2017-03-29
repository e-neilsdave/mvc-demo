<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gain
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\GainRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Gain
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="gains")
     * @ORM\JoinColumn(name="id_commercant", referencedColumnName="id", nullable=true)
     */
    private $commercant;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gains", cascade={"persist"})
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_points", type="integer")
     */
    private $nbPoints = 0;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=true)
     */
    private $timestamp;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_scan", type="datetime", nullable=true)
     */
    private $lastScan;
    
    /**
     * @var boolean $isEnabled
     *
     * @ORM\Column(name="shared", type="boolean")
     */
    private $shared = FALSE;
    


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
     * Set nbPoints
     *
     * @param integer $nbPoints
     * @return Gain
     */
    public function setNbPoints($nbPoints)
    {
        $this->nbPoints = $nbPoints;
    
        return $this;
    }

    /**
     * Get nbPoints
     *
     * @return integer 
     */
    public function getNbPoints()
    {
        return $this->nbPoints;
    }

    /**
     * Set commercant
     *
     * @param \Sofid\AdminBundle\Entity\Commercant $commercant
     * @return Gain
     */
    public function setCommercant(\Sofid\UserBundle\Entity\Commercant $commercant = null)
    {
        $this->commercant = $commercant;
    
        return $this;
    }

    /**
     * Get commercant
     *
     * @return \Sofid\AdminBundle\Entity\Commercant 
     */
    public function getCommercant()
    {
        return $this->commercant;
    }

    /**
     * Set user
     *
     * @param \Sofid\AdminBundle\Entity\User $user
     * @return Gain
     */
    public function setUser(\Sofid\AdminBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Sofid\AdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @ORM\PrePersist()
     */
    public function updateTimestamp()
    {
		$this->timestamp = new \DateTime;
		$this->shared = false;
    }    
    
    public function __toString()
    {
    	return sprintf("%s", $this->getCommercant());
    }
    
    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
    	return $this->timestamp;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Gain
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get lastScan
     *
     * @return \DateTime 
     */
    public function getLastScan()
    {
        return $this->lastScan;
    }
    
    /**
     * Set lastScan
     *
     * @param \DateTime $lastScan
     * @return Gain
     */
    public function setLastScan($lastScan)
    {
    	$this->lastScan = $lastScan;
    
    	return $this;
    }
    
    /**
     * Set shared
     *
     * @param boolean $shared
     * @return Gain
     */
    public function setShared($shared)
    {
        $this->shared = $shared;
    
        return $this;
    }

    /**
     * Get shared
     *
     * @return boolean 
     */
    public function getShared()
    {
        return $this->shared;
    }
}