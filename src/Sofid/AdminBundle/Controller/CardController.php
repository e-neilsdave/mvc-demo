<?php

namespace Sofid\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\AdminBundle\Entity\Card;

class CardController extends Controller
{
	public function createMobileCardAction()
	{
		$params = array();
		$content = $this->get("request")->getContent();
		if (!empty($content))
		{
			$params = json_decode($content, true);
		}else return new JsonResponse(array('error' => '2'));
		
		$idUser = $params['userid'];
		
		$user = $this->getDoctrine()
		->getRepository('SofidAdminBundle:User')
		->findOneBy(array('id' => $idUser));
		
		$cards = $user->getCards();
		
		if ($cards){
		
			$response = array();
		
			foreach ($cards as $card){
		
				if ($card->getType() == Card::TYPE_MOBILE)
				{
					return new JsonResponse(array('id' => 'SOFID_ID:' . $card->getEncryptedId() . '%TYPE:'.$card->getType(), 'qr_code' => $card->getEncryptedId()));
				}
					
			}
		}
		
		$em = $this->getDoctrine()->getManager();
		
    	$card = new Card();
    
    	$card->setType(Card::TYPE_MOBILE);
    	$card->setUser($user);
    	
    	$em->persist($card);
    	
    	$em->flush();
	
		return new JsonResponse(array('id' => 'SOFID_ID:' .$card->getEncryptedId(). '%TYPE:'.Card::TYPE_MOBILE, 'qr_code' => $card->getEncryptedId()));
	}
	
}