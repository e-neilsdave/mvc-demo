<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\OffreRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Offre
{
    const SERVER_PATH_TO_IMAGE_FOLDER = 'uploads/offer';

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
     * @ORM\Column(name="Title", type="string", length=100)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Recompense", type="string", length=100)
     */
    private $recompense;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Nb_point_offre", type="integer")
     */
    private $nbPointOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaires", type="string", length=255, nullable=true)
     */
    private $commentaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_lancement", type="datetime")
     */
    private $dateLancement;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_fin", type="datetime")
     */
    private $dateFin;
    
    /**
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="offres", cascade={"persist"})
     * @ORM\JoinColumn(name="Id_commercant", referencedColumnName="id")
     **/
    private $commercant;
    
    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="offre", cascade={"persist", "remove"})
     **/
    protected $transactions;
    
    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;


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
     * Set title
     *
     * @param string $title
     * @return Offre
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     * @return Offre
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;
    
        return $this;
    }

    /**
     * Get commentaires
     *
     * @return string 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set dateLancement
     *
     * @param \DateTime $dateLancement
     * @return Offre
     */
    public function setDateLancement($dateLancement)
    {
        $this->dateLancement = $dateLancement;
    
        return $this;
    }

    /**
     * Get dateLancement
     *
     * @return \DateTime 
     */
    public function getDateLancement()
    {
        return $this->dateLancement;
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
    
    public function __toString()
    {
    	return sprintf("%s", $this->getTitle());
    }

    /**
     * Set recompense
     *
     * @param string $recompense
     * @return Offre
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
     * Set nbPointOffre
     *
     * @param integer $nbPointOffre
     * @return Offre
     */
    public function setNbPointOffre($nbPointOffre)
    {
        $this->nbPointOffre = $nbPointOffre;
    
        return $this;
    }

    /**
     * Get nbPointOffre
     *
     * @return integer 
     */
    public function getNbPointOffre()
    {
        return $this->nbPointOffre;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add transactions
     *
     * @param \Sofid\AdminBundle\Entity\Transaction $transactions
     * @return Offre
     */
    public function addTransaction(\Sofid\AdminBundle\Entity\Transaction $transactions)
    {
        $this->transactions[] = $transactions;
    
        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \Sofid\AdminBundle\Entity\Transaction $transactions
     */
    public function removeTransaction(\Sofid\AdminBundle\Entity\Transaction $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
    
    public function getPath() {
        return $this->path;
    }

    public function setPath($path = null) {
        $this->path = $path;

        return $this;
    }

    public function getAbsolutePath()
    {
        return null === $this->imageName ? null : $this->getUploadRootDir('web').$this->imageName;
    }

    public function getWebPath()
    {
        return null === $this->imageName ? null : $this->getUploadDir().'/'.$this->imageName;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return Offre::SERVER_PATH_TO_IMAGE_FOLDER . '/' .$this->getId();
    }

    public function upload($basepath)
    {
        // the file property can be empty if the field is not required
        if (null === $this->path) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the target filename to move to
        $this->path->move($this->getUploadRootDir($basepath), $this->path->getClientOriginalName());

        // set the path property to the filename where you'ved saved the file
        $this->setPath($this->path->getClientOriginalName());

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}