<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gain
 *
 * @ORM\Entity
 * @ORM\Table(name="gain_history")
 */
class GainHistory
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
     * @ORM\Column(name="id_commercant", type="integer", nullable=true)
     */
    private $commercantId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_points", type="integer")
     */
    private $nbPoints = 0;
    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_scan", type="datetime", nullable=true)
     */
    private $lastScan;


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
     * Set commercantId
     *
     * @param integer $commercantId
     * @return GainHistory
     */
    public function setCommercantId($commercantId)
    {
        $this->commercantId = $commercantId;
    
        return $this;
    }

    /**
     * Get commercantId
     *
     * @return integer 
     */
    public function getCommercantId()
    {
        return $this->commercantId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return GainHistory
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set nbPoints
     *
     * @param integer $nbPoints
     * @return GainHistory
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
     * Set lastScan
     *
     * @param \DateTime $lastScan
     * @return GainHistory
     */
    public function setLastScan($lastScan)
    {
        $this->lastScan = $lastScan;
    
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
}
