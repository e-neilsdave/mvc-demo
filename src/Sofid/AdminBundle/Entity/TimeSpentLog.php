<?php

namespace Sofid\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeSpentLog
 *
 * @ORM\Table(name="time_spent_log")
 * @ORM\Entity()
 */

class TimeSpentLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @ORM\Column(name="duration", type="string", length=255, nullable=true)
     */
    private $duration;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="gains")
     * @ORM\JoinColumn(name="id_commercant", referencedColumnName="id", nullable=true)
     */
    private $commercant;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gains", cascade={"persist"})
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = new \DateTime($end);
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = new \DateTime($start);
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set commercant
     *
     * @param \Sofid\AdminBundle\Entity\Commercant $commercant
     * @return TimeSpentLog
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
     * Set user
     *
     * @param \Sofid\AdminBundle\Entity\User $user
     * @return Gain
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
}

