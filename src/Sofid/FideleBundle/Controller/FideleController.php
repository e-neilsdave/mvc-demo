<?php

namespace Sofid\FideleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\AdminBundle\Entity\User;
use Sofid\FideleBundle\Entity\CustomerOptins;
use Symfony\Component\HttpFoundation\Session\Session;
use Sofid\FideleBundle\Form\FideleType;
use Symfony\Component\HttpFoundation\Request;
use Mobyt\mobytSms;


class FideleController extends Controller
{
	
	public function loginAction()
	{	
		$session = $this->get('request')->getSession();
		
		if (!$session) {
			
			$session = new Session();
			$session->start();
			
		}
		
		$fidele_id = $session->get('fidele');
		 
		if ($fidele_id){
		
			$response = $this->forward('SofidFideleBundle:Fidele:profile');
		
			return $response;
		}else {
		
			return $this->render('SofidFideleBundle:Security:login.html.twig', array(
    			'error'      => false,
    		));
			
		}
	}
	
	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	
	public function forgottenPassAction(){
		 
		$email = $this->get("request")->get('login');
		
		$user = $this->getDoctrine()
		->getRepository('SofidAdminBundle:User')
		->findOneBy(array('email' => $email));
	
		if (!$user) {
	
			return $this->render('SofidFideleBundle:Security:forgotten_pass.html.twig', array(
					'error'      => true,
			));
	
		}else {
			
			$generatedPass = $this->generateRandomString(7);
			$pass = hash('sha512', $generatedPass);
			
			$user->setPassword($pass);
	
			$message = 'Suite a votre demande de reinitialisation, voici votre nouveau mot de passe SoFID : '.$generatedPass;
			
			$em = $this->getDoctrine()->getManager();
			
//			$commercant = $this->getDoctrine()
//			->getRepository('SofidUserBundle:Commercant')
//			->findOneBy(array('username' => 'armellaminsi'));
			
			$sms = new mobytSms();
			
			$sms->setLogin('armellaminsi');
			$sms->setPwd('3hl8nrdj');
			
			$sms->setAuthMd5();
			$sms->setFrom('SoFID');
			$sms->setDomaine('http://sms.cartesofid.com');
			
			$sms->setQualityDirect();
			
			$result = $sms->sendSms($user->getTelephone(), $message, 'TEXT', '','1');
			 
//			$commercant->setSms($commercant->getSms()+1);
			 
			$em->flush();
	
				return $this->render('SofidFideleBundle:Security:login.html.twig', array(
						'error'      => false,
						'sms'		 => 'Vous recevrez un sms contenant le mdp dans quelques instants!',
				));
	
		}
	}
	
    public function authenticateAction(){
    	
    		$login = $this->get("request")->get('login');
    		$pass = hash('sha512', $this->get("request")->get('pass'));
    		
    		$user = $this->getDoctrine()
    		->getRepository('SofidAdminBundle:User')
    		->findOneBy(array('email' => $login));
    		
    		if (!$user) {
    		
    			return $this->render('SofidFideleBundle:Security:login.html.twig', array(
    				'error'      => true,
    			));
    		
    		}else {
    		
    			if ($pass == $user->getPassword()){
    				
    				$session = $this->get('request')->getSession();
    				
    				$session->set('fidele', $user->getId());
    				
    				$response = $this->forward('SofidFideleBundle:Fidele:home');
				
				    return $response;
    				
    			}else {
    				
    				return $this->render('SofidFideleBundle:Security:login.html.twig', array(
    				'error'      => true,
    				));
    				
    			}
    			 
    		}
    }
    
    public function logoutAction(){
    
    	$this->get('security.context')->setToken(null);
    
    	$this->get('request')->getSession()->invalidate();
    
    	return $this->redirect($this->generateUrl('login_fidele'));
    }
    
    public function forgottenAction(){
    		 
    		return $this->render('SofidFideleBundle:Security:forgotten_pass.html.twig');

    }
    
    public function homeAction(){
    	
    	$session = $this->get('request')->getSession();
    	 
    	$id = $session->get('fidele');
    	
    	if (!$id) {
    		 
    		$this->get('request')->getSession()->invalidate();
    		 
    		return $this->redirect($this->generateUrl('login_fidele'));
    		 
    	}
    
    	$user = $this->getDoctrine()
    	->getRepository('SofidAdminBundle:User')
    	->find($id);
    		
    	if (!$user) {
    		
    		$this->get('request')->getSession()->invalidate();
    		
    		return $this->redirect($this->generateUrl('login_fidele'));
    		
    	}else {
    		
    		$gains = $user->getGains();
    			
    		return $this->render('SofidFideleBundle:Profile:show.html.twig', array(
    				'user'      => $user,
    				'gains'      => $gains,
    		));
    			
    	}
    }
    
    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editFideleAction()
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$session = $this->get('request')->getSession();
    	 
    	$id = $session->get('fidele');
    	
    	if (!$id) {
    	
    		$this->get('request')->getSession()->invalidate();
    	
    		return $this->redirect($this->generateUrl('login_fidele'));
    	
    	}
    
    	$user = $this->getDoctrine()
    	->getRepository('SofidAdminBundle:User')
    	->find($id);
    		
    	if (!$user) {
    		
    		$this->get('request')->getSession()->invalidate();
    		
    		return $this->redirect($this->generateUrl('login_fidele'));
    		
    	}else {
    
    	$editForm = $this->createForm(new FideleType(), $user);
    
    	return $this->render('SofidFideleBundle:Profile:edit.html.twig', array(
    			'user'      => $user,
    			'edit_form'   => $editForm->createView(),
    	));
    	
    	}
    }
    
    /**
     * Edits an existing User entity.
     *
     */
    public function updateFideleAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$session = $this->get('request')->getSession();
    	
    	$id = $session->get('fidele');
    	
    	if (!$id) {
    		 
    		$this->get('request')->getSession()->invalidate();
    		 
    		return $this->redirect($this->generateUrl('login_fidele'));
    		 
    	}
    	 
    	$user = $this->getDoctrine()
    	->getRepository('SofidAdminBundle:User')
    	->find($id);
    		
    	if (!$user) {
    		
    		$this->get('request')->getSession()->invalidate();
    		
    		return $this->redirect($this->generateUrl('login_fidele'));
    		
    	}else {
    		
    	$originalPassword = $user->getPassword();
    
    	$editForm = $this->createForm(new FideleType(), $user);
    	$editForm->bind($request);
    
    	if ($editForm->isValid()) {
    		
    		$plainPassword = $editForm->get('password')->getData();
    		if (!empty($plainPassword))  {
    			$user->setPassword(hash('sha512', $plainPassword));
    		}
    		else {
    			$user->setPassword($originalPassword);
    		}
    		
//     		return $this->render('SofidFideleBundle:Profile:show.html.twig', array(
//     				'user'      => $user,
//     		));
    		$em->persist($user);
    		$em->flush();
    		
    		$this->get('session')->getFlashBag()->add('notice', 'Vos changements sont pris en compte!');
    
    		return $this->redirect($this->generateUrl('edit_fidele'));
    	}
    
    	return $this->render('SofidFideleBundle:Profile:edit.html.twig', array(
    			'user'      => $user,
    			'edit_form'   => $editForm->createView(),
    	));
    	
    	}
    }
	public function customerOptionAction(Request $request)
    {
		    	
    	$session = $this->get('request')->getSession();
    	 
    	$id = $session->get('fidele');
		$em = $this->getDoctrine()->getManager();
    	if (!$id) {
    		 
    		$this->get('request')->getSession()->invalidate();
    		 
    		return $this->redirect($this->generateUrl('login_fidele'));
    		 
    	}
    
    	$user = $this->getDoctrine()
    	->getRepository('SofidAdminBundle:User')
    	->find($id);
    		
    	if (!$user) {
    		
    		$this->get('request')->getSession()->invalidate();
    		
    		return $this->redirect($this->generateUrl('login_fidele'));
    		
    	}else {
    		$gains = $user->getGains();
			if ($request->isMethod('POST')) { 
				$emailOptions = $request->get('emailoption');
				$smsOptions = $request->get('smsoption');
				$merchantids = $request->get('merchantids');
				for($i=0; $i < count($merchantids); $i++) {
					$merchant = $this->getDoctrine()
								->getRepository('SofidUserBundle:Commercant')->find($merchantids[$i]);
								
					$customerOptionsData = $this->getDoctrine()
						->getRepository("SofidFideleBundle:CustomerOptins")
						->createQueryBuilder('s')
						->where('s.customer_id = '.$id)
						->andwhere('s.merchant_id = '.$merchantids[$i])
						->getQuery()->execute();

					$custOpt = '';
					if(!count($customerOptionsData)){
						$custOpt = new CustomerOptins();
					} else {
						$custOpt=$this->getDoctrine()
							->getRepository("SofidFideleBundle:CustomerOptins")->find($customerOptionsData[0]->getId());
					}
					$custOpt->setMerchantId($merchant);
					$custOpt->setCustomerId($id);
					$custOpt->setEmailOptin((isset($emailOptions[$i])?1:0));
					$custOpt->setSmsOptin((isset($smsOptions[$i])?1:0));

					$em->persist($custOpt);
					$em->flush();	
					unset($merchant);
				}
			}
			$custoptin =array();
			foreach($gains as $gainData) {
				$merchantid = $gainData->getCommercant()->getId();
					$customerOptionsData = $this->getDoctrine()
						->getRepository("SofidFideleBundle:CustomerOptins")
						->createQueryBuilder('s')
						->where('s.customer_id = '.$id)
						->andwhere('s.merchant_id = '. $merchantid)
						->getQuery()->execute();
						$custoptin[$merchantid]['emailoption'] = $customerOptionsData[0]->getEmailOptin();
						$custoptin[$merchantid]['smsoption'] = $customerOptionsData[0]->getSmsOptin();
			}
    		return $this->render('SofidFideleBundle:Profile:customeroptins.html.twig', array(
    				'user'      => $user,
    				'gains'      => $gains,
					'custoptin' => $custoptin,
    		));
    			
    	}
    }    
}
