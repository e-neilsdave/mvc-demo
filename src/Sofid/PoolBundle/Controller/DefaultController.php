<?php

namespace Sofid\PoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\PoolBundle\Entity\Question;
use Sofid\PoolBundle\Entity\Option;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $question = $this->getDoctrine()->getRepository('PoolBundle:Question')->findOneByCommercant($commercant);

        if(!$question) {
            return $this->render('PoolBundle:Default:index.html.twig', array());
        } else {
            return $this->render('PoolBundle:Default:edit.html.twig', array('question' => $question, 'option' => $question->getOption()));
        }
    }

    public function listAction()
    {
        $questions = $this->getDoctrine()->getRepository('PoolBundle:Question')->findAll();
        return $this->render('PoolBundle:Default:list.html.twig', array('questions' => $questions));
    }

    public function editAction(Request $request)
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        if ($request->getMethod() == 'POST') {

            $params = $request->request->all();

            $em = $this->getDoctrine()->getManager();
            $question = $this->getDoctrine()->getRepository('PoolBundle:Question')->findOneById($params['question_id']);

            if($params['divided_value'] == 0 || $params['divided_value'] == null) {
                $devidedValue = 1;
            } else {
                $devidedValue = $params['divided_value'];
            }

            $question->setTitle($params['question_title']);
            $question->setCompletionPoint($params['completion_point']);
            $question->setCommentPoint($params['comment_point']);
            $question->setDelay($params['delay']);
            $question->setCommercant($commercant);
            $question->setIsActive($params['is_active']);
            $question->setDividedValue($devidedValue);
            $question->setDelayedCustomerMessage($params['delayed_customer_message']);
            $question->setDelayedThanksMessage($params['delayed_thanks_message']);

            $em->persist($question);

            $options = $this->getDoctrine()->getRepository('PoolBundle:Option')->findByQuestion($question);
            foreach($options as $key => $option) {
                $option->setTitle($params['option_title'][$key]);

                $em->persist($option);
            }

            $em->flush();
        }

        return new JsonResponse(array('result' => 1));
    }

    public function saveAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $params = $request->request->all();

            $em = $this->getDoctrine()->getManager();

            $question = new Question();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            if($params['divided_value'] == 0 || $params['divided_value'] == null) {
                $devidedValue = 1;
            } else {
                $devidedValue = $params['divided_value'];
            }

            $question->setTitle($params['question_title']);
            $question->setCompletionPoint($params['completion_point']);
            $question->setCommentPoint($params['comment_point']);
            $question->setDelay($params['delay']);
            $question->setDividedValue($devidedValue);
            $question->setDelayedCustomerMessage($params['delayed_customer_message']);
            $question->setDelayedThanksMessage($params['delayed_thanks_message']);
            $question->setCommercant($commercant);

            $em->persist($question);
            $em->flush();

            foreach($params['option_title'] as $key => $value) {
                $option = new Option();
                $option->setTitle($value);
                $option->setQuestion($question);

                $em->persist($option);
            }

            $em->flush();
        }

        return new JsonResponse(array('result' => 1));
    }


    public function resultsAction() {

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $questions = $this->getDoctrine()->getRepository('PoolBundle:Question')->findOneByCommercant($commercant);

        foreach($questions as $question) {
            var_dump($question->getOption());
        }die;

        return $this->render('PoolBundle:Default:results.html.twig', array());
    }
}
