<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/20/14
 */

namespace Sofid\PoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="feedback_record")
 */

class Feedback {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var text
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var text
     *
     * @ORM\Column(name="suggestion", type="text", nullable=true)
     */
    private $suggestion;

    /** @ORM\Column(type="datetime") */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\PoolBundle\Entity\Question", cascade={"persist"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * */
    private $question;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $created
     */
    public function setCreated()
    {
        $this->created =  new \DateTime("now");
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \Sofid\PoolBundle\Entity\text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return \Sofid\PoolBundle\Entity\text
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param \Sofid\PoolBundle\Entity\text $suggestion
     */
    public function setSuggestion($suggestion)
    {
        $this->suggestion = $suggestion;
    }

    /**
     * @return \Sofid\PoolBundle\Entity\text
     */
    public function getSuggestion()
    {
        return $this->suggestion;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion(\Sofid\PoolBundle\Entity\Question $question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

}