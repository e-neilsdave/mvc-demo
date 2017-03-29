<?php

namespace Sofid\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\UserBundle\Entity\Commercant;
use Sofid\AdminBundle\Entity\Palier;
use Sofid\CommercantBundle\Form\PalierType;
use Sofid\FideleBundle\Entity\CustomerOptins;
use Symfony\Component\HttpFoundation\Request;
use Mobyt\BackOffice;
use Mobyt\mobytSms;
use EE\DataExporterBundle\Service\DataExporter;
use Sofid\UserBundle\Helper\Nexmo;

class CommercantController extends Controller
{
    public function dashboardAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $ticket = $commercant->getTicketMoyen();

        $ticketEphem = $commercant->getTicketEphemMoyen();

        $shares = $commercant->getShares();

        $gains = $commercant->getGains();

        $nb_fideles = count($gains->toArray());

        $recompenses_paliers = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Transaction')
                ->getPaliersCount($commercant->getId());

        $recompenses_offres = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Transaction')
                ->getOffresCount($commercant->getId());

        $ca = ($commercant->getTicketMoyen() * $recompenses_paliers) + ($commercant->getTicketEphemMoyen() * $recompenses_offres);

        return $this->render('SofidCommercantBundle:commercant:dash.html.twig', array(
                    'recompenses_paliers' => $recompenses_paliers,
                    'recompenses_offres' => $recompenses_offres,
                    'shares' => $shares,
                    'nb_fideles' => $nb_fideles,
                    'ticket' => $ticket,
                    'ticketEphem' => $ticketEphem,
                    'ca' => $ca
        ));
    }

    public function listAction(Request $request)
    {
        $action = $request->query->get('action');
        if (!empty($action)) {
            $data = $this->export();
            $exporter = new DataExporter();

            $columns = array('[userId]' => 'UserId', '[username]'=>'Username','[email]'=> 'User Email','[lastScan]' => 'Last Scan', '[nbpts]' => 'Points Sofid', '[nbScan]' => 'Total Scans');
            $hooks = array('[lastScan]');

            $export = $this->get('export');
            $fileNme=new \DateTime();
            $exportor = $export->files('xls', $fileNme, $columns, $hooks, $exporter);


            $exporter->setData($data);
            return $exporter->render();
        }
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $nbpts = $commercant->getNbPointScan();
        $is_editable = $commercant->getEditable();
        $conversionValue = $commercant->getConversionValue();

        $gains = $commercant->getGains();
        $message = $commercant->getMessageManualPointsScreen();
        $display_editable = $commercant->getDisplayEditable();
        $displayExportOpt = $commercant->getExportOption();
        $users = array();
        $user = array();

        foreach ($gains->toArray() as $gain) {
            if ($gain->getUser()) {
                $user['username'] = $gain->getUser()->getUsername();
                $user['nbpts'] = $gain->getNbPoints();
                if ($gain->getUser()->getDateNaissance())
                    $user['dateNaissance'] = $gain->getUser()->getDateNaissance()->format('d-m-Y');
                else
                    $user['dateNaissance'] = "";
                $users[] = $user;
            }
        }
        return $this->render('SofidCommercantBundle:commercant:list.html.twig', array(
                    'users' => $users,
                    'nbpts' => $nbpts,
                    'conversionValue' => $conversionValue,
                    'is_editable' => $is_editable,
                    'message' => $message,
                    'display_editable' => $display_editable,
                    'display_export' => $displayExportOpt,
        ));
    }

    public function paliersAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $paliers = $commercant->getPaliers();

        return $this->render('SofidCommercantBundle:commercant:list_paliers.html.twig', array(
                    'paliers' => $paliers));
    }

    public function checkAction()
    {

        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $id = $params['id'];
        $pass = $params['password'];

        $commercant = new Commercant();

        $commercant = $this->getDoctrine()
                ->getRepository('SofidUserBundle:Commercant')
                ->findOneBy(array('id' => $id));

        if (!$commercant) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $encoder_service = $this->get('sofid.sofid_encoder');
            if ($encoder_service->isPasswordValidAPI($commercant->getPassword(), $pass, $commercant->getSalt())) {
                return new JsonResponse(array('data' => true));
            } else {
                return new JsonResponse(array('data' => false));
            }
        }
    }

    public function retrievePaliersAction()
    {

        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idCommercant = $params['idcom'];

        $commercant = new Commercant();

        $commercant = $this->getDoctrine()
                ->getRepository('SofidUserBundle:Commercant')
                ->findOneBy(array('id' => $idCommercant));

        if (!$commercant) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $paliers = $commercant->getPaliers();
            if ($paliers) {

                $JsonPaliers = array();
                $response = array();

                foreach ($paliers->toArray() as $palier) {
                    $response['nbpts'] = $palier->getNbPointPalier();
                    $response['name'] = $palier->getRecompense();
                    $response['id'] = $palier->getId();
                    $JsonPaliers[] = $response;
                }
            }

            $offres = $commercant->getOffres();
            if ($offres) {

                $JsonOffres = array();
                $response = array();

                foreach ($offres->toArray() as $offre) {

                    $current = new \DateTime("now");
                    if (($current >= $offre->getDateLancement()) && ($current < $offre->getDateFin())) {
                        $response['nbpts'] = $offre->getNbPointOffre();
                        $response['name'] = $offre->getRecompense();
                        $response['id'] = $offre->getId();
                        $response['image'] = $offre->getPath();

                        $JsonOffres[] = $response;
                    }
                }
            }

            return new JsonResponse(array('data' => array('paliers' => $JsonPaliers, 'offres' => $JsonOffres)));
        }
    }
    public function retrieveCommercantAction(Request $request)
    {
        //$content = $this->get("request")->getContent();
		$customerid = $request->get('customerid');
        if (empty($customerid)) {
            return new JsonResponse(array('error' => '2'));
		}
		$user = $this->getDoctrine()
			->getRepository('SofidAdminBundle:User')
			->find($customerid);
        if (!$user) {
    		return new JsonResponse(array('error' => '2'));
    	}else {
			$customerOptionsData = $this->getDoctrine()
				->getRepository("SofidFideleBundle:CustomerOptins")
				->createQueryBuilder('s')
				->where('s.customer_id = '.$customerid)
				->getQuery()->execute();
			if (!$customerOptionsData) {
				return new JsonResponse(array('error' => '1'));
			} else {
                $JsonCommercant = array();
                $response = array();
	
				foreach($customerOptionsData  as $data) {
					$response['idCommercant'] = $data->getMerchantId()->getId();
					$response['entreprise'] = $data->getMerchantId()->getEntreprise();
					$JsonCommercant[] = $response;
				}
				return new JsonResponse(array('data' => array('commercant' => $JsonCommercant)));
			}
		}
    }
    public function updateCustomerOptionsAction(Request $request)
    {
        //$content = $this->get("request")->getContent();
		$customerid = $request->get('customerid');
		$commercantid = $request->get('commercantid');
		$smsOptions= $request->get('smsOptions',1);
		$emailOptions= $request->get('emailOptions',1);

        if (empty($customerid) || empty($commercantid)) {
            return new JsonResponse(array('error' => '2'));
		}
		$user = $this->getDoctrine()
			->getRepository('SofidAdminBundle:User')
			->find($customerid);
		
        if (!$user) {
    		return new JsonResponse(array('error' => '2'));
    	}
		$commercant = $this->getDoctrine()
					->getRepository('SofidUserBundle:Commercant')->find($commercantid);
		if (!$commercant) {
    		return new JsonResponse(array('error' => '2'));
    	} else {
			$customerOptionsData = $this->getDoctrine()
				->getRepository("SofidFideleBundle:CustomerOptins")
				->createQueryBuilder('s')
				->where('s.customer_id = '.$customerid)
				->andwhere('s.merchant_id = '.$commercantid)
				->getQuery()->execute();
			$custOpt='';
			if(!count($customerOptionsData)){
				$custOpt = new CustomerOptins();
				$custOpt->setMerchantId($commercant);
				$custOpt->setCustomerId($customerid);
			} else {
				$custOpt=$this->getDoctrine()
					->getRepository("SofidFideleBundle:CustomerOptins")->find($customerOptionsData[0]->getId());
			}
			$custOpt->setEmailOptin($emailOptions);
			$custOpt->setSmsOptin($smsOptions);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($custOpt);
			$em->flush();	
			return new JsonResponse(array('data' => true));
		}
    }	
    public function authenticateAction()
    {

        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $login = $params['login'];
        $pass = $params['pass'];

        $commercant = $this->getDoctrine()
                ->getRepository('SofidUserBundle:Commercant')
                ->findOneBy(array('username' => $login));

        if (!$commercant) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $encoder_service = $this->get('sofid.sofid_encoder');
            if ($encoder_service->isPasswordValidAPI($commercant->getPassword(), $pass, $commercant->getSalt())) {
                $adresse = sprintf("%s %s %s", $commercant->getAdresse(), $commercant->getCodePostal(), $commercant->getVille());
                $data = array('id' => $commercant->getId(), 'adresse' => $adresse, 'entreprise' => $commercant->getEntreprise(), 'scanpts' => $commercant->getNbPointScan(), 'image' => $commercant->getPicture() ? 'http://www.cartesofid.com/uploads/commercants/' . $commercant->getId() . '/' . $commercant->getPicture() : 'http://www.cartesofid.com/uploads/commercants/sofid.png');
                return new JsonResponse(array('data' => $data));
            } else {
                return new JsonResponse(array('error' => '1'));
            }
        }
    }

    public function logoutCommercantAction()
    {

        $this->get('security.context')->setToken(null);

        $this->get('request')->getSession()->invalidate();

        return $this->redirect($this->generateUrl('list_fideles'));
    }

    public function changeScanAction(Request $request, $nb)
    {

        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $commercant->setNbPointScan($nb);
            $commercant->setEditable($request->get('is_editable'));
            $commercant->setConversionValue($request->get('conversion_value'));

            $commercant->setMessageManualPointsScreen($request->get('message'));
            $em->flush();

            return new JsonResponse(array('result' => 1));
        } else {
            return new JsonResponse(array('error' => 1));
        }
    }

    public function changeTicketAction(Request $request, $nb)
    {

        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $commercant->setTicketMoyen($nb);

            $em->flush();

            $recompenses_paliers = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Transaction')
                    ->getPaliersCount($commercant->getId());

            $recompenses_offres = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Transaction')
                    ->getOffresCount($commercant->getId());

            $ca = ($commercant->getTicketMoyen() * $recompenses_paliers) + ($commercant->getTicketEphemMoyen() * $recompenses_offres);

            return new JsonResponse(array('result' => $ca));
        } else {
            return new JsonResponse(array('error' => 1));
        }
    }

    public function changeTicketEphemAction(Request $request, $nb)
    {

        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $commercant->setTicketEphemMoyen($nb);

            $em->flush();

            $recompenses_paliers = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Transaction')
                    ->getPaliersCount($commercant->getId());

            $recompenses_offres = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Transaction')
                    ->getOffresCount($commercant->getId());

            $ca = ($commercant->getTicketMoyen() * $recompenses_paliers) + ($commercant->getTicketEphemMoyen() * $recompenses_offres);

            return new JsonResponse(array('result' => $ca));
        } else {
            return new JsonResponse(array('error' => 1));
        }
    }

    public function addPalierAction()
    {

        $em = $this->getDoctrine()->getManager();

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $nombrePaliers = count($commercant->getPaliers()->toArray());

        $number = 1;
        if ($nombrePaliers > 0) {
            foreach ($commercant->getPaliers() as $pal) {
                if ($pal->getNumPalier() == $number)
                    $number++;
            }
        }


        $palier = new Palier();
        $palier->setNbPointPalier(1);
        $palier->setNumPalier($number);
        $palier->setRecompense("");

        $palier->setCommercant($commercant);

        $em->persist($palier);

        $em->flush();

        return new JsonResponse(array('nombre' => $number, 'id' => $palier->getId()));
    }

    /**
     * Displays a form to edit an existing Palier entity.
     *
     */
    public function editPalierAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Palier entity.');
        }

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $com = $entity->getCommercant();
        if (!($com === $commercant)) {

            return $this->render('SofidCommercantBundle:commercant:edit_paliers.html.twig', array(
                        'unauthorized' => true,
            ));
        }

        $editForm = $this->createForm(new PalierType(), $entity);

        return $this->render('SofidCommercantBundle:commercant:edit_paliers.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'unauthorized' => false,
        ));
    }

    /**
     * Edits an existing Palier entity.
     *
     */
    public function updatePalierAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Palier entity.');
        }

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $com = $entity->getCommercant();
        if (!($com === $commercant)) {

            return $this->render('SofidCommercantBundle:commercant:edit_paliers.html.twig', array(
                        'unauthorized' => true,
            ));
        }

        $editForm = $this->createForm(new PalierType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('edit_palier', array('id' => $id)));
        }

        return $this->render('SofidCommercantBundle:commercant:edit_paliers.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'unauthorized' => false,
        ));
    }

    public function deletePalierAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $palier = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Palier')
                ->find($id);

        if (!$palier) {
            return new JsonResponse(array('error' => 2));
        }

        $com = $palier->getCommercant();
        if ($com === $commercant) {

            $em->remove($palier);

            $em->flush();

            return new JsonResponse(array('result' => 1));
        } else {
            return new JsonResponse(array('error' => 1));
        }
    }

    public function sendSMSAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $message = $request->request->get('msg');
			$custfreq = $request->request->get('custfreq');
			$custfreqcondition = $request->request->get('custfreqcondition');
			$custpur = $request->request->get('custpur');
			$custpurcondition = $request->request->get('custpurcondition');
			$date1 = date('Y-m-d',strtotime($request->request->get('date1')));
			$date2 = date('Y-m-d',strtotime($request->request->get('date2')));
			$params= array();
			$getGainsHistoryArr=array();
			if($custfreq !='') {
				if($date1 || $date2) {
					$where = ' where ';
					if($date1) {
						$where .=  " last_scan >= '".$date1."' and";
					}
					if($date2) {
						$where .= " last_scan <='".$date2."'";
					}
				}
				$sql ="	SELECT id_user,count(id_user) as cnt FROM gain_history ";
				$sql .= rtrim($where, 'and');
				$sql .=" group by id_user 
						having cnt ".$custfreqcondition." '".$custfreq."'  order by id_user";
				$getGainsHistory = $em->getConnection()->executeQuery($sql, $params)->fetchAll();
				foreach($getGainsHistory as $data) {
					$getGainsHistoryArr[$data['id_user']] = $data['id_user'];
				}
			}
			$getGainsHistoryPurchaseArr=array();
			if($custpur != '') {
				$where = '';
				if($date1 || $date2) {
					$where = ' where ';
					if($date1) {
						$where .=  " last_scan >= '".$date1."' and";
					}
					if($date2) {
						$where .= " last_scan <='".$date2."'";
					}
				}
				$sql = "SELECT id_user,count(id_user) as cnt, sum(nb_points) as nbspoints FROM gain_history ";
				$sql .= rtrim($where, 'and');
				$sql .= " group by id_user 
						having nbspoints ".$custpurcondition." '".$custpur."' order by id_user";
				$getGainsHistoryPurchase = $em->getConnection()->executeQuery($sql, $params)->fetchAll();
				
				foreach($getGainsHistoryPurchase as $data) {
					$getGainsHistoryPurchaseArr[$data['id_user']] = $data['id_user'];
				}
			}
            if ((!$commercant) || (!$message)) {
                return new JsonResponse(array('error' => 1));
            }

            $fideles = $commercant->getGains();

            $nb_fideles = count($fideles->toArray());

            if ($nb_fideles == 0) {
                return new JsonResponse(array('error' => 2));
            }


//            $sms = new mobytSms();
//
//            $sms->setLogin($commercant->getUsername());
//            $sms->setPwd('3hl8nrdj');
//
//            $sms->setAuthMd5();
//            $sms->setFrom('SoFID');
//            $sms->setDomaine('http://sms.cartesofid.com');

//            $sms->setQualityDirect();

            $phoneNumbers = array();
            $results      = array();
            foreach ($fideles as $fidele) {
				$merchantid = $commercant->getId();
				$custid = $fidele->getUser()->getId();
				$customerOptionsData = $this->getDoctrine()
					->getRepository("SofidFideleBundle:CustomerOptins")->createQueryBuilder('s')
					->where('s.customer_id = '.$custid)
					->andwhere('s.merchant_id = '. $merchantid)
					->getQuery()->execute();
					//$customerOptionsData[0]->getEmailOptin();
					$smsoptions = '1';
					if(isset($customerOptionsData[0])) {
						$smsoptions = $customerOptionsData[0]->getSmsOptin();
					}
					$smsflag=0;
					if(count($getGainsHistoryArr)  && isset($getGainsHistoryArr[$custid])  && $getGainsHistoryArr[$custid] == $custid) {
						$smsflag=1;
					}
					if(count($getGainsHistoryPurchaseArr) && isset($getGainsHistoryPurchaseArr[$custid]) && $getGainsHistoryPurchaseArr[$custid] == $custid) {
						$smsflag=1;
					}
                if($smsflag==1 && $smsoptions == '1' && is_object($fidele->getUser()) && method_exists($fidele->getUser(), 'getRandomData')){
                    $randomData = $fidele->getUser()->getRandomData();
                    if (!$randomData) {
                        $number = $fidele->getUser()->getTelephone();
                        if (!array_key_exists($number, $phoneNumbers)) {
                            $phoneNumbers[$number] = 1;
                            $nexmoManager = $this->get("nexmo_sms_manager");
                            $nexmoManager->send($number, $message);
                        }
                    }
                }
            }

            $em->flush();

            foreach($results as $result) {
                if(substr($result, 0, 2) == 'OK') {
                    $response = $result;
                    break;
                }else {
                    $response = null;
                }
            }

            if (substr($response, 0, 2) == 'OK')
                return new JsonResponse(array('result' => $response));
            else
                return new JsonResponse(array('error' => $result));
        }else {
            return new JsonResponse(array('error' => 0));
        }
    }

    public function smsAction()
    {
        return $this->render('SofidCommercantBundle:commercant:sms.html.twig');
    }

    public function createClientAction()
    {

        $client = new BackOffice();

        $client->setUser('F08426');

        $client->setPW('jdrn8lh3');

        $options['email'] = 'client@client.fr';
        $options['vhost'] = 'http://www.mondomaine.fr';
        $options['credit'] = '50.0000';

        $result = $client->clientAdd('test', 'test', 'test', $options);

        if (substr($result, 0, 2) == 'OK')
            return new Response('Good ' . $result);
        else
            return new Response('Bad ' . $result);
    }

    public function export()
    {
        $em = $this->getDoctrine()->getManager();

        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();

        $gains = $em->getRepository('SofidAdminBundle:Gain')->findBy(array('commercant' => $commercant->getId()), array('lastScan' => 'DESC'));
        $data = array();
        foreach ($gains as $gain) {
            $user = $gain->getUser();
            $userId = $user->getId();
//                    $user=$em->getRepository('SofidAdminBundle:User')->findOneBy(array('id'=>$userId));
            $data[] = array(
                'lastScan' => $gain->getLastScan(),
                'nbpts' => $gain->getNbPoints(),
                'userId' => $userId,
                'username'=>$user->getUsername(),
                'nbScan' => $user->getPointsSofid(),
                'email' => $user->getEmail()
            );
        }
        return $data;
    }

}
