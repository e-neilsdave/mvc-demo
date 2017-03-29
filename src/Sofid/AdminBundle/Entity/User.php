<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sofid\AdminBundle\Entity\UserRepository")
 */
class User
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone", type="string", length=255)
     */
    private $telephone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_sofid", type="integer")
     */
    private $pointsSofid = 0;

    /**
     * @ORM\OneToMany(targetEntity="Card", mappedBy="user", cascade={"persist", "remove"})
     **/
    protected $cards;
    
    /**
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="user", cascade={"persist"})
     **/
    protected $transactions;
    
    /**
     * @ORM\OneToMany(targetEntity="Gain", mappedBy="user", cascade={"persist", "remove"})
     **/
    protected $gains;

    /**
     * @ORM\OneToMany(targetEntity="TimeSpentLog", mappedBy="user", cascade={"persist", "remove"})
     **/
    protected $timeSpentLogs;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="random_data", type="boolean")
     */
    protected $random_data=0;

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
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set pointsSofid
     *
     * @param integer $pointsSofid
     * @return User
     */
    public function setPointsSofid($pointsSofid)
    {
        $this->pointsSofid = $pointsSofid;
    
        return $this;
    }

    /**
     * Get pointsSofid
     *
     * @return integer 
     */
    public function getPointsSofid()
    {
        return $this->pointsSofid;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->random_data = false;
    }
    
    /**
     * Add cards
     *
     * @param \Sofid\AdminBundle\Entity\Card $cards
     * @return User
     */
    public function addCard(\Sofid\AdminBundle\Entity\Card $cards)
    {
        $this->cards[] = $cards;
    
        return $this;
    }

    /**
     * Remove cards
     *
     * @param \Sofid\AdminBundle\Entity\Card $cards
     */
    public function removeCard(\Sofid\AdminBundle\Entity\Card $cards)
    {
        $this->cards->removeElement($cards);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCards()
    {
        return $this->cards;
    }
    
    /**
     * Set cards
     */
    public function setCards($cards)
    {
    	$this->cards = $cards;
    	
    	return $this;
    }
    
    public function __toString()
    {
    	return sprintf("%s", $this->getUsername());
    }

    /**
     * Add gains
     *
     * @param \Sofid\AdminBundle\Entity\Gain $gains
     * @return User
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add transactions
     *
     * @param \Sofid\AdminBundle\Entity\Transaction $transactions
     * @return User
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
     * Set random_data
     *
     * @param boolean $randomData
     * @return User
     */
    public function setRandomData($randomData)
    {
        $this->random_data = $randomData;
    
        return $this;
    }

    /**
     * Get random_data
     *
     * @return boolean 
     */
    public function getRandomData()
    {
        return $this->random_data;
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
}
