<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/15/14
 */

namespace Sofid\PoolBundle\Controller;

use Sofid\PoolBundle\Entity\Feedback;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\UserBundle\Entity\Commercant;
use Sofid\PoolBundle\Entity\Question;
use Sofid\PoolBundle\Entity\Option;
use Sofid\PoolBundle\Entity\AnswerRecord;

class ApiController extends Controller
{


    public function getQuestionByMercantAction()
    {
        $params  = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '1', 'message' => 'No content available'));

        $idCommercant = $params['merchantId'];
        $userId       = $params['userId'];

        $user = $this->getDoctrine()->getRepository('SofidAdminBundle:User')->findOneById($userId);

        if(!$user) {
            return new JsonResponse(array('error' => '2', 'message' => 'No user found'));
        }

        $commercant = $this->getDoctrine()->getRepository('\SofidUserBundle:Commercant')->findOneBy(array('id' => $idCommercant));

        if(!$commercant) {
            return new JsonResponse(array('error' => '2', 'message' => 'No merchant found'));
        }

        $data = array();
        if(!$commercant->getQuestions()) {
            return new JsonResponse(array('error' => '3', 'message' => 'No question available'));
        } else {
            foreach ($commercant->getQuestions() as $key => $question) {

                if($question->getDividedValue() == null || $question->getDividedValue() == 0) {
                    $devidedValue = 1;
                } else {
                    $devidedValue = $question->getDividedValue();
                }

                $data[$key]['poolTitle']            = $question->getTitle();
                $data[$key]['poolCompletionPoints'] = $question->getCompletionPoint();
                $data[$key]['poolCommentPoints']    = $question->getCommentPoint();
                $data[$key]['is_active']            = $question->getIsActive();
                $data[$key]['devided_value']            = $devidedValue;
                $data[$key]['delayed_customer_message'] = $question->getDelayedCustomerMessage();
                $data[$key]['delayed_thanks_message']   = $question->getDelayedThanksMessage();

                if($question) {
                    $answerRecords = $this->getDoctrine()->getRepository('PoolBundle:AnswerRecord')->getLastPoolByUser($user);

                    if($answerRecords) {
                        $datetime2 = new \DateTime("now");
                        $interval = $answerRecords[0]->getCreated()->diff($datetime2);

                        if($interval->format('%R%a') < $question->getDelay()) {
                            $data[$key]['already_pool'] = 1;
                        } else {
                            $data[$key]['already_pool'] = 0;
                        }
                    } else {
                        $data[$key]['already_pool'] = 0;
                    }
                }

                foreach ($question->getOption() as $k => $option) {
                    if($option->getTitle() != '') {
                        $options[$k]['questionId']   = $option->getId();
                        $options[$k]['questionName'] = $option->getTitle();
                    }
                }

                $data[$key]['questions'] = $options;
            }

            return new JsonResponse(array('data' => $data));
        }
    }

    public function savePoolAction()
    {
        $params  = array();

        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '1', 'message' => 'No content available'));

        $userId        = $params['userId'];
        $poolId        = $params['pool'];
        $poolQuestions = $params['poolQuestions'];

        if(array_key_exists('comment', $params)) {
            $comment = $params['comment'];
        } else {
            $comment = null;
        }

        if(array_key_exists('suggestion', $params)) {
            $suggestion = $params['suggestion'];
        } else {
            $suggestion = null;
        }

        $em = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()->getRepository('SofidAdminBundle:User')->findOneById($userId);

        if(!$user) {
            return new JsonResponse(array('error' => '2', 'message' => 'No user found'));
        }

        $pool = $this->getDoctrine()->getRepository('PoolBundle:Question')->findOneById($poolId);
        if(!$pool) {
            return new JsonResponse(array('error' => '3', 'message' => 'No question found'));
        }

        if($pool) {

            $answerRecords = $this->getDoctrine()->getRepository('PoolBundle:AnswerRecord')->getLastPoolByUser($user);

            if($answerRecords) {
                $datetime2 = new \DateTime("now");
                $interval = $answerRecords[0]->getCreated()->diff($datetime2);

                if($interval->format('%R%a') < $pool->getDelay()) {
                    $result = array(
                        'delay' => $pool->getDelay(),
                        'divided_value' => $pool->getDividedValue(),
                        'delayed_customer_message' => $pool->getDelayedCustomerMessage(),
                        'delayed_thanks_message' => $pool->getDelayedThanksMessage()
                    );
                    return new JsonResponse(array('response' => $result, 'info' => '1', 'message' => 'User already pooled in between delay date'));
                }
            }
        }

        if(empty($poolQuestions)) {
            return new JsonResponse(array('error' => '4', 'message' => 'No answer provided'));
        } else {
            foreach($poolQuestions as $poolQuestion) {
                $answerRecord = new AnswerRecord();

                $option = $this->getDoctrine()->getRepository('PoolBundle:Option')->findOneBy(array('id' => $poolQuestion['questionId']));

                $answerRecord->setUser($user);
                $answerRecord->setQuestion($pool);
                $answerRecord->setOption($option);
                $answerRecord->setAnswer($poolQuestion['answer']);
                $answerRecord->setCreated();

                $em->persist($answerRecord);
            }

            $feedback = new Feedback();

            $feedback->setComment($comment);
            $feedback->setSuggestion($suggestion);
            $feedback->setQuestion($pool);
            $feedback->setCreated();

            $em->persist($feedback);

            $em->flush();

            return new JsonResponse(array('result' => 1));
        }
    }
}