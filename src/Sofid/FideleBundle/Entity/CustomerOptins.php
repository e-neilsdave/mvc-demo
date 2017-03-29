<?php

namespace Sofid\FideleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customer_optins")
 */

class CustomerOptins
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

	/**
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="customer", cascade={"persist"})
     * @ORM\JoinColumn(name="merchant_id", referencedColumnName="id")
     **/
    protected $merchant_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     */
    private $customer_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_optin", type="integer")
     */
    private $email_optin;

    /**
     * @var integer
     *
     * @ORM\Column(name="sms_optin", type="integer")
     */
    private $sms_optin;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $merchant_id
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }



    /**
     * @param mixed $option
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $email_optin
     */
    public function setEmailOptin($email_optin)
    {
        $this->email_optin = $email_optin;
    }

    /**
     * @return mixed
     */
    public function getEmailOptin()
    {
        return $this->email_optin;
    }



    /**
     * @param mixed $sms_optin
     */
    public function setSmsOptin($sms_optin)
    {
        $this->sms_optin = $sms_optin;
    }

    /**
     * @return mixed
     */
    public function getSmsOptin()
    {
        return $this->sms_optin;
    }
}