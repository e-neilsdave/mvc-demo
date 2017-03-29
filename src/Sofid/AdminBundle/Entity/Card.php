<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\CardRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Card
{
	const TYPE_CARD  = 'CARD';
	const TYPE_MOBILE     = 'MOBILE_APP';
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="encrypted_id", type="string", nullable=true)
     */
    private $encryptedId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=10)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="Nb_scan", type="integer")
     */
    private $nbScan = 0;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="cards", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_user", referencedColumnName="id", nullable=true)
     **/
    private $user;


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
     * Set nbScan
     *
     * @param integer $nbScan
     * @return Card
     */
    public function setNbScan($nbScan)
    {
        $this->nbScan = $nbScan;
    
        return $this;
    }

    /**
     * Get nbScan
     *
     * @return integer 
     */
    public function getNbScan()
    {
        return $this->nbScan;
    }

    /**
     * Set user
     *
     * @param \Sofid\AdminBundle\Entity\User $user
     * @return Card
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
    
    public function __toString()
    {
    	return sprintf("%d", $this->getId());
    }
    
//     /**
//      * @ORM\PostPersist
//      */
//     public function setPreEncryptedId()
//     {
//     	$em = $this->getDoctrine()->getManager();
    	
//     	$salt = 'jhgggygkyuT45dsqqsdfqszefq54ds';
			
// 		$this->setEncryptedId(hash('sha512',($salt.$this->getId())));
			
// 		$em->flush();
//     }

    /**
     * Set encryptedId
     *
     * @param string $encryptedId
     * @return Card
     */
    public function setEncryptedId($encryptedId)
    {
        $this->encryptedId = $encryptedId;
    
        return $this;
    }

    /**
     * Get encryptedId
     *
     * @return string 
     */
    public function getEncryptedId()
    {
        return $this->encryptedId;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Card
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}