<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gain
 * @ORM\Entity
 * @ORM\Table(name="cache_gain")
 */
class GainCache
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
     * @ORM\Column(name="id_commercant", type="integer")
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
     * @var boolean $isUpdated
     *
     * @ORM\Column(name="isUpdated", type="boolean")
     */
    private $isUpdated;
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
     * @return GainCache
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
     * @return GainCache
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
     * @return GainCache
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
     * @return GainCache
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


    /**
     * Set isUpdated
     *
     * @param boolean $isUpdated
     * @return GainCache
     */
    public function setIsUpdated($isUpdated)
    {
        $this->isUpdated = $isUpdated;
    
        return $this;
    }

    /**
     * Get isUpdated
     *
     * @return boolean 
     */
    public function getIsUpdated()
    {
        return $this->isUpdated;
    }
}
