<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\TransactionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Transaction
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_user", referencedColumnName="id", nullable=true)
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_commercant", referencedColumnName="id", nullable=true)
     **/
    private $commercant;

    /**
     * @ORM\ManyToOne(targetEntity="Offre", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_offre", referencedColumnName="id", nullable=true)
     **/
    private $offre;
    
    /**
     * @ORM\ManyToOne(targetEntity="Palier", inversedBy="transactions", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_palier", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     **/
    private $palier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;


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
     * Set user
     *
     * @param integer $user
     * @return Transaction
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set commercant
     *
     * @param \Sofid\AdminBundle\Entity\Commercant $commercant
     * @return Offre
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
     * Set offre
     *
     * @param integer $offre
     * @return Transaction
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;
    
        return $this;
    }

    /**
     * Get offre
     *
     * @return integer 
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Transaction
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
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
     * @ORM\PrePersist
     */
    public function setPreTimestamp()
    {
    	$this->timestamp = new \DateTime;
    }


    /**
     * Set palier
     *
     * @param \Sofid\AdminBundle\Entity\Palier $palier
     * @return Transaction
     */
    public function setPalier(\Sofid\AdminBundle\Entity\Palier $palier = null)
    {
        $this->palier = $palier;
    
        return $this;
    }

    /**
     * Get palier
     *
     * @return \Sofid\AdminBundle\Entity\Palier 
     */
    public function getPalier()
    {
        return $this->palier;
    }
}