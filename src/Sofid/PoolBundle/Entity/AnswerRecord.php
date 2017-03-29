<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/16/14
 */

namespace Sofid\PoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Sofid\PoolBundle\Entity\AnswerRecordRepository")
 * @ORM\Table(name="answer_record")
 */
class AnswerRecord {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="answer", type="integer")
     */
    protected $answer;

    /** @ORM\Column(type="datetime") */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\PoolBundle\Entity\Question", cascade={"persist"})
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\PoolBundle\Entity\Option", cascade={"persist"})
     * @ORM\JoinColumn(name="option_id", referencedColumnName="id")
     * */
    private $option;

    /**
     * @ORM\ManyToOne(targetEntity="Sofid\AdminBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }



    /**
     * @param mixed $option
     */
    public function setOption(\Sofid\PoolBundle\Entity\Option $option)
    {
        $this->option = $option;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
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



    /**
     * Set user
     *
     * @param \Sofid\AdminBundle\Entity\User $user
     * @return Card
     */
    public function setUser(\Sofid\AdminBundle\Entity\User $user)
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

    public function setCreated()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

}