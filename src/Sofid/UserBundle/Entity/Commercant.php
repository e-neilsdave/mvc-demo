<?php

namespace Sofid\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManager;
use FOS\AdvancedEncoderBundle\Security\Encoder\EncoderAwareInterface;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Table(name="commercant")
 * @ORM\Entity(repositoryClass="Sofid\UserBundle\Entity\CommercantRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Commercant extends BaseUser implements EncoderAwareInterface
{

    public function __construct()
    {
        parent::__construct();
        $this->editable = false;
        $this->MessageManualPointsScreen = "De combien de points devons nous créditer votre compte fidélité ?";
        $this->display_editable = false;
        $this->roles = array('ROLE_COMMERCANT');
        $this->exportOption=false;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\File(maxSize="8000000")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $sms = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\AdminBundle\Entity\Categories")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     * */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $ticketMoyen = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $ticketEphemMoyen = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(name="facebook_page", type="string", length=255, nullable=true)
     */
    private $facebookPage;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $phone;

    /**
     * Encrypted password. Must be persisted.
     *
     * @var string
     */
    protected $password = "";

    /**
     * @var integer
     *
     * @ORM\Column(name="Nb_point_scan", type="integer")
     */
    private $nbPointScan = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="shares", type="integer")
     */
    private $shares = 0;

    /**
     * @var string
     * 
     * @ORM\Column(name="Entreprise", type="string", length=255, nullable=true)
     *
     */
    protected $entreprise;

    /**
     * @var boolean
     * @ORM\Column(name="Editable", type="boolean")
     */
    protected $editable = 0;
    

    
     /**
     * @var boolean
     * @ORM\Column(name="display_editable", type="boolean")
     */
    protected $display_editable = 0;
    
   /**
     * @var boolean
     * @ORM\Column(name="export_option", type="boolean", length=255)
     */
    protected $exportOption=false;

    
    /**
     * @var string
     * @ORM\Column(name=" message_manual_points_creen", type="string", length=80)
     */
    protected $MessageManualPointsScreen='De combien de points devons-nous créditer votre compte fidélité ?';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="limit_points1", type="integer")
     */
    private $limitpoints1=0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="limit_points2", type="integer")
     */
    private $limitpoints2=0;
    

    /**
     * @var string
     * 
     * @ORM\Column(name="Raison_sociale", type="string", length=255, nullable=true)
     *
     */
    protected $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255, nullable=true)
     *
     */
    protected $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="conversion_value", type="string", nullable=true)
     *
     */
    protected $conversionValue;

   /**
     * @var string
     *
     * @ORM\Column(name="Code_postal", type="string", length=255, nullable=true)
     *
     */
    protected $codePostal;
    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=255, nullable=true)
     *
     */
    protected $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=255, nullable=true)
     *
     */
    protected $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     *
     */
    protected $code;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\AdminBundle\Entity\Palier", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"numPalier" = "asc"})
     *
     */
    protected $paliers;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\AdminBundle\Entity\Offre", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"nbPointOffre" = "asc"})
     *
     */
    protected $offres;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\AdminBundle\Entity\Gain", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    protected $gains;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\AdminBundle\Entity\TimeSpentLog", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    protected $timeSpentLogs;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\AdminBundle\Entity\Transaction", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    protected $transactions;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\PoolBundle\Entity\Question", mappedBy="commercant", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    protected $questions;

    private $temp;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function isEditable()
    {
        return $this->editable;
    }

    public function setEditable($boolean)
    {
        $this->editable = (Boolean) $boolean;

        return $this;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     * @return User
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set raisonSociale
     *
     * @param string $raisonSociale
     * @return User
     */
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    /**
     * Get raisonSociale
     *
     * @return string 
     */
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return User
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return User
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add paliers
     *
     * @param \Sofid\AdminBundle\Entity\Palier $paliers
     * @return Commercant
     */
    public function addPalier(\Sofid\AdminBundle\Entity\Palier $paliers)
    {
        $this->paliers[] = $paliers;

        return $this;
    }

    /**
     * Remove paliers
     *
     * @param \Sofid\AdminBundle\Entity\Palier $paliers
     */
    public function removePalier(\Sofid\AdminBundle\Entity\Palier $paliers)
    {
        $this->paliers->removeElement($paliers);
    }

    /**
     * Get paliers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaliers()
    {
        return $this->paliers;
    }

    /**
     * Set paliers
     *
     * @return User
     */
    public function setPaliers($paliers)
    {
        $this->paliers = $paliers;

        return $this;
    }

    /**
     * Add offres
     *
     * @param \Sofid\AdminBundle\Entity\Offre $offres
     * @return Commercant
     */
    public function addOffre(\Sofid\AdminBundle\Entity\Offre $offres)
    {
        $this->offres[] = $offres;

        return $this;
    }

    /**
     * Remove offres
     *
     * @param \Sofid\AdminBundle\Entity\Offre $offres
     */
    public function removeOffre(\Sofid\AdminBundle\Entity\Offre $offres)
    {
        $this->offres->removeElement($offres);
    }

    /**
     * Get offres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOffres()
    {
        return $this->offres;
    }

    public function __toString()
    {
        return sprintf("%s", $this->getFullname());
    }

    /**
     * Add gains
     *
     * @param \Sofid\AdminBundle\Entity\Gain $gains
     * @return Commercant
     */
    public function addGain(\Sofid\AdminBundle\Entity\Gain $gains)
    {
        $this->gains[] = $gains;

        return $this;
    }

    /**
     * Remove gains
     *
     * @param \Sofid\AdminBundle\Entity\Gain $gains
     */
    public function removeGain(\Sofid\AdminBundle\Entity\Gain $gains)
    {
        $this->gains->removeElement($gains);
    }

    /**
     * Get gains
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGains()
    {
        return $this->gains;
    }

    /**
     * Set gains
     *
     * @return User
     */
    public function setGains($gains)
    {
        $this->gains = $gains;

        return $this;
    }

    /**
     * Add timeSpentLogs
     *
     * @param \Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs
     * @return User
     */
    public function addTimeSpentLog(\Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs)
    {
        $this->timeSpentLogs[] = $timeSpentLogs;

        return $this;
    }

    /**
     * Remove timeSpentLogs
     *
     * @param \Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs
     */
    public function removeTimeSpentLog(\Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs)
    {
        $this->gains->removeElement($timeSpentLogs);
    }

    /**
     * Get timeSpentLogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimeSpentLog()
    {
        return $this->timeSpentLogs;
    }

    /**
     * Set gains
     *
     * @return User
     */
    public function setTimeSpentLog($timeSpentLogs)
    {
        $this->timeSpentLogs = $timeSpentLogs;

        return $this;
    }

    public function getEncoderName()
    {

        return "sofid_encoder";
    }

    /**
     * Set nbPointScan
     *
     * @param integer $nbPointScan
     * @return Commercant
     */
    public function setNbPointScan($nbPointScan)
    {
        $this->nbPointScan = $nbPointScan;

        return $this;
    }

    /**
     * Get nbPointScan
     *
     * @return integer 
     */
    public function getNbPointScan()
    {
        return $this->nbPointScan;
    }

    /**
     * Set shares
     *
     * @param integer $shares
     * @return Commercant
     */
    public function setShares($shares)
    {
        $this->shares = $shares;

        return $this;
    }

    /**
     * Get shares
     *
     * @return integer
     */
    public function getShares()
    {
        return $this->shares;
    }

    /**
     * Add transactions
     *
     * @param \Sofid\AdminBundle\Entity\Transaction $transactions
     * @return Commercant
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

    /**
     * Add questions
     *
     * @param \Sofid\PoolBundle\Entity\Question $question
     * @return Commercant
     */
    public function addQuestion(\Sofid\PoolBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param Sofid\PoolBundle\Entity\Question $questions
     */
    public function removeQuestion(\Sofid\PoolBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Commercant
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setImage(UploadedFile $image = null)
    {
        $this->image = $image;
        // check if we have an old image path
        if (isset($this->picture)) {
            // store the old name to delete after the update
            $this->temp = $this->picture;
            $this->picture = null;
        } else {
            $this->picture = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->picture ? null : $this->getUploadRootDir() . '/' . $this->picture;
    }

    public function getWebPath()
    {
        return null === $this->picture ? null : $this->getUploadDir() . '/' . $this->picture;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du r�pertoire o� les documents upload�s doivent �tre sauvegard�s
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se d�barrasse de � __DIR__ � afin de ne pas avoir de probl�me lorsqu'on affiche
        // le document/image dans la vue.
        return 'uploads/commercants/' . $this->getId();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getImage()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->picture = $filename . '.' . $this->getImage()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getImage()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getImage()->move($this->getUploadRootDir(), $this->picture);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->image = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($image = $this->getAbsolutePath()) {
            unlink($image);
        }
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Commercant
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Commercant
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return Commercant
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set sms
     *
     * @param integer $sms
     * @return Commercant
     */
    public function setSms($sms)
    {
        $this->sms = $sms;

        return $this;
    }

    /**
     * Get sms
     *
     * @return string
     */
    public function getSms()
    {
        return $this->sms;
    }

    /**
     * Set ticketMoyen
     *
     * @param integer $ticketMoyen
     * @return Commercant
     */
    public function setTicketMoyen($ticketMoyen)
    {
        $this->ticketMoyen = $ticketMoyen;

        return $this;
    }

    /**
     * Get ticketEphemMoyen
     *
     * @return integer
     */
    public function getTicketEphemMoyen()
    {
        return $this->ticketEphemMoyen;
    }

    /**
     * Set ticketEphemMoyen
     *
     * @param integer $ticketEphemMoyen
     * @return Commercant
     */
    public function setTicketEphemMoyen($ticketEphemMoyen)
    {
        $this->ticketEphemMoyen = $ticketEphemMoyen;

        return $this;
    }

    /**
     * Get ticketMoyen
     *
     * @return integer
     */
    public function getTicketMoyen()
    {
        return $this->ticketMoyen;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Commercant
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook page
     *
     * @param string $facebookPage
     * @return Commercant
     */
    public function setFacebookPage($facebookPage)
    {
        $this->facebookPage = $facebookPage;

        return $this;
    }

    /**
     * Get facebook page
     *
     * @return string
     */
    public function getFacebookPage()
    {
        return $this->facebookPage;
    }


    /**
     * Set gender
     *
     * @param string $gender
     * @return Commercant
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Commercant
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return Commercant
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Commercant
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get editable
     *
     * @return boolean 
     */
    public function getEditable()
    {
        return $this->editable;
    }


    /**
     * Set limitpoints1
     *
     * @param integer $limitpoints1
     * @return Commercant
     */
    public function setLimitpoints1($limitpoints1)
    {
        $this->limitpoints1 = $limitpoints1;
    
        return $this;
    }

    /**
     * Get limitpoints1
     *
     * @return integer 
     */
    public function getLimitpoints1()
    {
        return $this->limitpoints1;
    }

    /**
     * Set limitpoints2
     *
     * @param integer $limitpoints2
     * @return Commercant
     */
    public function setLimitpoints2($limitpoints2)
    {
        $this->limitpoints2 = $limitpoints2;
    
        return $this;
    }

    /**
     * Get limitpoints2
     *
     * @return integer 
     */
    public function getLimitpoints2()
    {
        return $this->limitpoints2;
    }

    /**
     * Set MessageManualPointsScreen
     *
     * @param string $messageManualPointsScreen
     * @return Commercant
     */
    public function setMessageManualPointsScreen($messageManualPointsScreen)
    {
        $this->MessageManualPointsScreen = $messageManualPointsScreen;
    
        return $this;
    }

    /**
     * Get MessageManualPointsScreen
     *
     * @return string 
     */
    public function getMessageManualPointsScreen()
    {
        return $this->MessageManualPointsScreen;
    }

    /**
     * Set display_editable
     *
     * @param boolean $displayEditable
     * @return Commercant
     */
    public function setDisplayEditable($displayEditable)
    {
        $this->display_editable = $displayEditable;
    
        return $this;
    }

    /**
     * Get display_editable
     *
     * @return boolean 
     */
    public function getDisplayEditable()
    {
        return $this->display_editable;
    }

    /**
     * Set exportOption
     *
     * @param boolean $exportOption
     * @return Commercant
     */
    public function setExportOption($exportOption)
    {
        $this->exportOption = $exportOption;
    
        return $this;
    }

    /**
     * Get exportOption
     *
     * @return boolean 
     */
    public function getExportOption()
    {
        return $this->exportOption;
    }



    /**
     * Set conversionValue
     *
     * @param string $conversionValue
     * @return Commercant
     */
    public function setConversionValue($conversionValue)
    {
        $this->conversionValue = $conversionValue;
    
        return $this;
    }

    /**
     * Get conversionValue
     *
     * @return string 
     */
    public function getConversionValue()
    {
        return $this->conversionValue;
    }

    /**
     * qr code
     *
     * @return string
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this->code;
    }

    public function getCode()
    {
        return $this->code;
    }
}
