<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Palier
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\PalierRepository")
 */
class Palier
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
     * @ORM\Column(name="Nb_point_palier", type="integer", options={"default":"0"})
     */
    private $nbPointPalier = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Num_palier", type="smallint", options={"default":"0"})
     */
    private $numPalier = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="Recompense", type="text", nullable=true)
     * @Assert\Length(
     *      max = "60",
     *      maxMessage = "La recompense ne doit pas depasser les {{ limit }} caracteres"
     * )
     */
    private $recompense;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="paliers", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_commercant", referencedColumnName="id")
     **/
    private $commercant;
    
    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="palier", cascade={"persist"})
     **/
    protected $transactions;


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
     * Set nbPointPalier
     *
     * @param integer $nbPointPalier
     * @return Palier
     */
    public function setNbPointPalier($nbPointPalier)
    {
        $this->nbPointPalier = $nbPointPalier;
    
        return $this;
    }

    /**
     * Get nbPointPalier
     *
     * @return integer 
     */
    public function getNbPointPalier()
    {
        return $this->nbPointPalier;
    }

    /**
     * Set numPalier
     *
     * @param integer $numPalier
     * @return Palier
     */
    public function setNumPalier($numPalier)
    {
        $this->numPalier = $numPalier;
    
        return $this;
    }

    /**
     * Get numPalier
     *
     * @return integer 
     */
    public function getNumPalier()
    {
        return $this->numPalier;
    }

    /**
     * Set recompense
     *
     * @param string $recompense
     * @return Palier
     */
    public function setRecompense($recompense)
    {
        $this->recompense = $recompense;
    
        return $this;
    }

    /**
     * Get recompense
     *
     * @return string 
     */
    public function getRecompense()
    {
        return $this->recompense;
    }

    /**
     * Set commercant
     *
     * @param \Sofid\AdminBundle\Entity\Commercant $commercant
     * @return Palier
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
    
    public function __toString()
    {
    	return sprintf("%d", $this->getId());
    }
}