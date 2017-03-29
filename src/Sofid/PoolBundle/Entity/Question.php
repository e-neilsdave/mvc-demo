<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/13/14
 */
namespace Sofid\PoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */

class Question {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(name="completion_point", type="integer")
     */
    private $completionPoint;

    /**
     * @ORM\Column(name="comment_point", type="integer")
     */
    private $commentPoint;

    /**
     * @ORM\Column(name="delay", type="integer")
     */
    private $delay;

    /**
     * @ORM\Column(name="divided_value", type="integer", nullable=true)
     */
    private $dividedValue;

    /**
     * @ORM\Column(name="delayed_customer_message", type="string", length=255, nullable=true)
     */
    private $delayedCustomerMessage;

    /**
     * @ORM\Column(name="delayed_thanks_message", type="string", length=255, nullable=true)
     */
    private $delayedThanksMessage;

    /**
     * @ORM\Column(name="is_active", type="integer")
     */
    private $isActive = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\UserBundle\Entity\Commercant", inversedBy="questions", cascade={"persist"})
     * @ORM\JoinColumn(name="commercant_id", referencedColumnName="id")
     **/
    private $commercant;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\PoolBundle\Entity\Option", mappedBy="question", cascade={"persist", "remove"}, orphanRemoval=true)
     * */
    protected $options;

    /**
     * @ORM\OneToMany(targetEntity="Sofid\PoolBundle\Entity\Feedback", mappedBy="feedback", cascade={"persist", "remove"}, orphanRemoval=true)
     * */
    protected $feedback;

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
     * Set complete points
     *
     * @param string $completionPoint
     * @return Offre
     */
    public function setCompletionPoint($completionPoint)
    {
        $this->completionPoint = $completionPoint;

        return $this;
    }

    /**
     * Get complete points
     *
     * @return string
     */
    public function getCompletionPoint()
    {
        return $this->completionPoint;
    }

    /**
     * Set comment point
     *
     * @param string $commentPoint
     * @return Offre
     */
    public function setCommentPoint($commentPoint)
    {
        $this->commentPoint = $commentPoint;

        return $this;
    }

    /**
     * Get comment point
     *
     * @return string
     */
    public function getCommentPoint()
    {
        return $this->commentPoint;
    }

    /**
     * @param mixed $dividedValue
     */
    public function setDividedValue($dividedValue)
    {
        $this->dividedValue = $dividedValue;
    }

    /**
     * @return mixed
     */
    public function getDividedValue()
    {
        return $this->dividedValue;
    }

    /**
     * @param mixed $delayedCustomerMessage
     */
    public function setDelayedCustomerMessage($delayedCustomerMessage)
    {
        $this->delayedCustomerMessage = $delayedCustomerMessage;
    }

    /**
     * @return mixed
     */
    public function getDelayedCustomerMessage()
    {
        return $this->delayedCustomerMessage;
    }

    /**
     * @param mixed $delayedThanksMessage
     */
    public function setDelayedThanksMessage($delayedThanksMessage)
    {
        $this->delayedThanksMessage = $delayedThanksMessage;
    }

    /**
     * @return mixed
     */
    public function getDelayedThanksMessage()
    {
        return $this->delayedThanksMessage;
    }

    /**
     * @param mixed $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
    }

    /**
     * @return mixed
     */
    public function getDelay()
    {
        return $this->delay;
    }



    /**
     * Set commercant
     *
     * @param string $commercant
     * @return Offre
     */
    public function setCommercant($commercant)
    {
        $this->commercant = $commercant;

        return $this;
    }

    /**
     * Get commercant
     *
     * @return string
     */
    public function getCommercant()
    {
        return $this->commercant;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }



    /**
     * Add options
     *
     * @param \Sofid\PoolBundle\Entity\Option $options
     * @return qustions
     */
    public function addOption(\Sofid\PoolBundle\Entity\Option $options)
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \Sofid\PoolBundle\Entity\Question $options
     */
    public function removeOption(\Sofid\PoolBundle\Entity\Option $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOption()
    {
        return $this->options;
    }

    /**
     * Add feedback
     *
     * @param \Sofid\PoolBundle\Entity\Feedback $feedback
     * @return feedback
     */
    public function addFeedback(\Sofid\PoolBundle\Entity\Feedback $feedback)
    {
        $this->feedback[] = $feedback;

        return $this;
    }

    /**
     * Remove feedback
     *
     * @param \Sofid\PoolBundle\Entity\Feedback $feedback
     */
    public function removeFeedback(\Sofid\PoolBundle\Entity\Feedback $feedback)
    {
        $this->feedback->removeElement($feedback);
    }

    /**
     * Get $feedback
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFeedback()
    {
        return $this->feedback;
    }
}