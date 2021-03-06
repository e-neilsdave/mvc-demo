<?php

namespace Proxies\__CG__\Sofid\AdminBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \Sofid\AdminBundle\Entity\User implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'email', 'dateNaissance', 'telephone', 'username', 'firstname', 'lastname', 'gender', 'password', 'pointsSofid', 'cards', 'transactions', 'gains', 'timeSpentLogs', 'random_data');
        }

        return array('__isInitialized__', 'id', 'email', 'dateNaissance', 'telephone', 'username', 'firstname', 'lastname', 'gender', 'password', 'pointsSofid', 'cards', 'transactions', 'gains', 'timeSpentLogs', 'random_data');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrenom($prenom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrenom', array($prenom));

        return parent::setPrenom($prenom);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrenom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrenom', array());

        return parent::getPrenom();
    }

    /**
     * {@inheritDoc}
     */
    public function setNom($nom)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNom', array($nom));

        return parent::setNom($nom);
    }

    /**
     * {@inheritDoc}
     */
    public function getNom()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNom', array());

        return parent::getNom();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateNaissance($dateNaissance)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateNaissance', array($dateNaissance));

        return parent::setDateNaissance($dateNaissance);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateNaissance()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateNaissance', array());

        return parent::getDateNaissance();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelephone($telephone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelephone', array($telephone));

        return parent::setTelephone($telephone);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelephone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelephone', array());

        return parent::getTelephone();
    }

    /**
     * {@inheritDoc}
     */
    public function setPointsSofid($pointsSofid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPointsSofid', array($pointsSofid));

        return parent::setPointsSofid($pointsSofid);
    }

    /**
     * {@inheritDoc}
     */
    public function getPointsSofid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPointsSofid', array());

        return parent::getPointsSofid();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstname($firstname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstname', array($firstname));

        return parent::setFirstname($firstname);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstname', array());

        return parent::getFirstname();
    }

    /**
     * {@inheritDoc}
     */
    public function setGender($gender)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGender', array($gender));

        return parent::setGender($gender);
    }

    /**
     * {@inheritDoc}
     */
    public function getGender()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGender', array());

        return parent::getGender();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastname($lastname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastname', array($lastname));

        return parent::setLastname($lastname);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastname', array());

        return parent::getLastname();
    }

    /**
     * {@inheritDoc}
     */
    public function addCard(\Sofid\AdminBundle\Entity\Card $cards)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCard', array($cards));

        return parent::addCard($cards);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCard(\Sofid\AdminBundle\Entity\Card $cards)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCard', array($cards));

        return parent::removeCard($cards);
    }

    /**
     * {@inheritDoc}
     */
    public function getCards()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCards', array());

        return parent::getCards();
    }

    /**
     * {@inheritDoc}
     */
    public function setCards($cards)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCards', array($cards));

        return parent::setCards($cards);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function addGain(\Sofid\AdminBundle\Entity\Gain $gains)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addGain', array($gains));

        return parent::addGain($gains);
    }

    /**
     * {@inheritDoc}
     */
    public function removeGain(\Sofid\AdminBundle\Entity\Gain $gains)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeGain', array($gains));

        return parent::removeGain($gains);
    }

    /**
     * {@inheritDoc}
     */
    public function getGains()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGains', array());

        return parent::getGains();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($username)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', array($username));

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', array());

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function addTransaction(\Sofid\AdminBundle\Entity\Transaction $transactions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTransaction', array($transactions));

        return parent::addTransaction($transactions);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTransaction(\Sofid\AdminBundle\Entity\Transaction $transactions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTransaction', array($transactions));

        return parent::removeTransaction($transactions);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactions', array());

        return parent::getTransactions();
    }

    /**
     * {@inheritDoc}
     */
    public function setRandomData($randomData)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRandomData', array($randomData));

        return parent::setRandomData($randomData);
    }

    /**
     * {@inheritDoc}
     */
    public function getRandomData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRandomData', array());

        return parent::getRandomData();
    }

    /**
     * {@inheritDoc}
     */
    public function addTimeSpentLog(\Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTimeSpentLog', array($timeSpentLogs));

        return parent::addTimeSpentLog($timeSpentLogs);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTimeSpentLog(\Sofid\AdminBundle\Entity\TimeSpentLog $timeSpentLogs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeTimeSpentLog', array($timeSpentLogs));

        return parent::removeTimeSpentLog($timeSpentLogs);
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeSpentLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTimeSpentLog', array());

        return parent::getTimeSpentLog();
    }

}
