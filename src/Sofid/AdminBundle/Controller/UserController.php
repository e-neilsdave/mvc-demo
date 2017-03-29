<?php

namespace Sofid\AdminBundle\Controller;

use Sofid\AdminBundle\Entity\TimeSpentLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sofid\AdminBundle\Entity\User;
use Sofid\AdminBundle\Entity\Gain;
use Sofid\AdminBundle\Entity\Offre;
use Sofid\AdminBundle\Entity\Transaction;
use Sofid\AdminBundle\Entity\Card;
use Sofid\AdminBundle\Entity\GainCache;
use Sofid\AdminBundle\Entity\GainHistory;
use Sofid\AdminBundle\Entity\Proposals;
use Mobyt\mobytSms;
use Sofid\UserBundle\Helper\Nexmo;
use Sofid\UserBundle\Entity\Commercant;

class UserController extends Controller
{

    public function getBaseTemplate()
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            return $this->container->get('sonata.admin.pool')->getTemplate('ajax');
        }

        return $this->container->get('sonata.admin.pool')->getTemplate('layout');
    }

    public function qrcodeAction()
    {
        return $this->render('SofidAdminBundle:User:qrcode.html.twig', array(
                    'base_template' => $this->getBaseTemplate()
        ));
    }

    public function downloadAction($id)
    {
        $content = file_get_contents("http://chart.apis.google.com/chart?cht=qr&chl=SOFID_ID:" . $id . "%TYPE:CARD&chs=240x240");

        $card = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Card')
                ->findOneBy(array('encryptedId' => $id));

        $response = new Response();

        if ($card) {

            if ($card->getType() == Card::TYPE_CARD) {
                //set headers
                $response->headers->set('Content-Type', 'mime/type');
                $response->headers->set('Content-Disposition', 'attachment;filename="SoFid_QrCode_' . $id . ".png");

                $response->setContent($content);

                return $response;
            }
        }
    }

    public function commercantQrCodeDownloadAction($id)
    {
        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:commercant')
            ->findOneBy(array('id' => $id));

        if($commercant) {
            $content = file_get_contents("http://chart.apis.google.com/chart?cht=qr&chl=SOFID_ID:" . $commercant->getCode() . "%TYPE:CARD&chs=240x240");

            $response = new Response();

            $response->headers->set('Content-Type', 'mime/type');
            $response->headers->set('Content-Disposition', 'attachment;filename="SoFid_QrCode_' .  $commercant->getCode() . ".png");

            $response->setContent($content);

            return $response;
        }
    }

    public function encodeAction()
    {

        $em = $this->getDoctrine()->getManager();

        $card = new Card();

        $card->setType(Card::TYPE_CARD);

        $em->persist($card);

        $em->flush();

        $encrypted_id = $card->getEncryptedId();

        return new JsonResponse(array('id' => $encrypted_id));
    }

    public function scanAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $encryptedCardId = $params['userid'];
        $idCommercant = $params['idcom'];

        $card = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Card')
                ->findOneBy(array('encryptedId' => $encryptedCardId));

        if (!$card) {
            return new JsonResponse(array('error' => '1'));
        } else {

            $user = $card->getUser();

            if (!$user) {
                return new JsonResponse(array(
                    'new' => '1',
                    'default_email' => $this->generateRandomEmail(),
                    'default_telephone' => $this->generateRandomTelephone()));
            } else {

                $em = $this->getDoctrine()->getManager();

                $gain = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:Gain')
                        ->findOneBy(array('user' => $user->getId(), 'commercant' => $idCommercant));

                $cacheGain = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:GainCache')
                        ->findOneBy(array('userId' => $user->getId(), 'commercantId' => $idCommercant));

                $commercant = $this->getDoctrine()
                        ->getRepository('SofidUserBundle:Commercant')
                        ->findOneBy(array('id' => $idCommercant));

                if (!$cacheGain) {
                    $cacheGain = new GainCache();
                }
                if (!$commercant) {
                    return new JsonResponse(array('error' => '1'));
                }

                $isEditable = $commercant->getEditable();

                if ($isEditable) {
                    $points = 0;
                } else {
                    $points = $commercant->getNbPointScan();
                }

                if (!$gain) {
                    $gain = new Gain();
                    $gain->setCommercant($commercant);
                    $gain->setUser($user);
                    $gain->setNbPoints($points);
                    $gain->setTimestamp(new \DateTime);
                    $gain->setLastScan(new \DateTime);
                    $gain->setShared(false);
                    $em->persist($gain);

                    $cacheGain->setCommercantId($commercant->getId());
                    $cacheGain->setUserId($user->getId());
                    $cacheGain->setLastScan(new \DateTime);
                    $cacheGain->setNbPoints($points);
                    $cacheGain->setIsUpdated(false);
                    $em->persist($cacheGain);

                    $user->setPointsSofid($user->getPointsSofid() + 1);
                    $em->persist($user);
                } else {

                    $timestamp = new \DateTime('-15 min');
                    if ($gain->getLastScan() < $timestamp) {
                        $gain->setNbPoints($gain->getNbPoints() + $points);
                        $gain->setTimestamp(new \DateTime);
                        $gain->setLastScan(new \DateTime);
                        $gain->setShared(false);
                        $em->persist($gain);

                        $cacheGain->setCommercantId($commercant->getId());
                        $cacheGain->setUserId($user->getId());
                        $cacheGain->setLastScan(new \DateTime);
                        $cacheGain->setNbPoints($gain->getNbPoints());
                        $cacheGain->setIsUpdated(false);
                        $em->persist($cacheGain);

                        $user->setPointsSofid($user->getPointsSofid() + 1);
                        $em->persist($user);
                    }
                }

                $em->flush();

                return new JsonResponse(array(
                    'data' => array(
                        'id' => $user->getId(),
                        'username' => $user->getUsername(),
                        'random_data' => $user->getRandomData(),
                        'email' => $user->getEmail(),
                        'telephone' => $user->getTelephone(),
                        'nbpts' => $gain->getNbPoints(),
                        'editable' => $commercant->getEditable(),
                        'limitpoints1' => $commercant->getLimitpoints1(),
                        'limitpoints2' => $commercant->getLimitpoints2(),
                        'message_nb' => $commercant->getMessageManualPointsScreen()
                    )
                ));
            }
        }
    }

    public function scanV2Action()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $encryptedCardId = $params['userid'];
        $idCommercant = $params['idcom'];

        $card = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Card')
                ->findOneBy(array('encryptedId' => $encryptedCardId));

        if (!$card) {
            return new JsonResponse(array('error' => '1'));
        } else {

            $user = $card->getUser();

            if (!$user) {
                return new JsonResponse(array(
                    'new' => '1',
                    'default_email' => $this->generateRandomEmail(),
                    'default_telephone' => '+33600000000'));
            } else {

                $em = $this->getDoctrine()->getManager();

                $gain = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:Gain')
                        ->findOneBy(array('user' => $user->getId(), 'commercant' => $idCommercant));

                $cacheGain = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:GainCache')
                        ->findOneBy(array('userId' => $user->getId(), 'commercantId' => $idCommercant));

                $commercant = $this->getDoctrine()
                        ->getRepository('SofidUserBundle:Commercant')
                        ->findOneBy(array('id' => $idCommercant));

                $conversionValue = $commercant->getConversionValue();
                if (empty($conversionValue)) {
                    $conversionValue = 1;
                }
                if (!$cacheGain) {
                    $cacheGain = new GainCache();
                }
                if (!$commercant) {
                    return new JsonResponse(array('error' => '3'));
                }
                $isEditable = $commercant->getEditable();

                if ($isEditable) {
                    $points = 0;
                } else {
                    $points = $commercant->getNbPointScan();
                }
                if (!$gain) {
                    $gain = new Gain();
                    $gain->setCommercant($commercant);
                    $gain->setUser($user);
                    $gain->setNbPoints($points);
                    $gain->setTimestamp(new \DateTime);
                    $gain->setLastScan(new \DateTime);
                    $gain->setShared(false);
                    $em->persist($gain);

                    $cacheGain->setCommercantId($commercant->getId());
                    $cacheGain->setUserId($user->getId());
                    $cacheGain->setLastScan(new \DateTime);
                    $cacheGain->setNbPoints($points);
                    $cacheGain->setIsUpdated(false);
                    $em->persist($cacheGain);

                    $gainHistory = new GainHistory();
                    $gainHistory->setCommercantId($commercant->getId());
                    $gainHistory->setUserId($user->getId());
                    $gainHistory->setLastScan(new \DateTime);
                    $gainHistory->setNbPoints($points);
                    $em->persist($gainHistory);

                    $user->setPointsSofid($user->getPointsSofid() + 1);
                    $em->persist($user);
                } else {
                    //Blocage 10 minutes
                    $timestamp = new \DateTime('-15 min');
                    // if ($gain->getLastScan() < $timestamp) {
                    $gain->setNbPoints($gain->getNbPoints() + $points);
                    $gain->setTimestamp(new \DateTime);
                    $gain->setLastScan(new \DateTime);
                    $gain->setShared(false);
                    $em->persist($gain);

                    $cacheGain->setCommercantId($commercant->getId());
                    $cacheGain->setUserId($user->getId());
                    $cacheGain->setLastScan(new \DateTime);
                    $cacheGain->setNbPoints($gain->getNbPoints());
                    $cacheGain->setIsUpdated(false);
                    $em->persist($cacheGain);

                    $gainHistory = new GainHistory();
                    $gainHistory->setCommercantId($commercant->getId());
                    $gainHistory->setUserId($user->getId());
                    $gainHistory->setLastScan(new \DateTime);
                    $gainHistory->setNbPoints($points);
                    $em->persist($gainHistory);
//                    
                    $user->setPointsSofid($user->getPointsSofid() + 1);
                    $em->persist($user);
                    //}
                }

                $em->flush();

                return new JsonResponse(array(
                    'data' => array(
                        'id' => $user->getId(),
                        'username' => $user->getUsername(),
                        'nbpts' => $gain->getNbPoints(),
                        'conversionValue' => $conversionValue,
                        'editable' => $commercant->getEditable(),
                        'random_data' => $user->getRandomData(),
                        'email' => $user->getEmail(),
                        'telephone' => $user->getTelephone(),
                        'limitpoints1' => $commercant->getLimitpoints1(),
                        'limitpoints2' => $commercant->getLimitpoints2(),
                        'message_nb' => $commercant->getMessageManualPointsScreen(),
                        'merchant_name' => $commercant->getEntreprise(),
                        'merchant_address' => $commercant->getAdresse() . ' ' . $commercant->getCodePostal() . ' ' . $commercant->getVille()
                    )
                ));
            }
        }
    }

    public function scanByEmailOrPhoneAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $email = $params['email'];
        $telephone = $params['telephone'];
        $idCommercant = $params['idcom'];

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneByEmailOrPhone($email, $telephone);

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $em = $this->getDoctrine()->getManager();

            $gain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Gain')
                    ->findOneBy(array('user' => $user->getId(), 'commercant' => $idCommercant));

            $commercant = $this->getDoctrine()
                    ->getRepository('SofidUserBundle:Commercant')
                    ->findOneBy(array('id' => $idCommercant));

            $cacheGain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:GainCache')
                    ->findOneBy(array('userId' => $user->getId(), 'commercantId' => $idCommercant));
            if (!$commercant) {
                return new JsonResponse(array('error' => '1'));
            }
            if (!$cacheGain) {
                $cacheGain = new GainCache();
            }

            $isEditable = $commercant->getEditable();

            if ($isEditable) {
                $points = 0;
            } else {
                $points = $commercant->getNbPointScan();
            }

            if (!$gain) {

                $gain = new Gain();
                $gain->setCommercant($commercant);
                $gain->setUser($user);
                $gain->setNbPoints($points);
                $gain->setTimestamp(new \DateTime);
                $gain->setLastScan(new \DateTime);
                $gain->setShared(false);
                $em->persist($gain);

                $cacheGain->setCommercantId($commercant->getId());
                $cacheGain->setUserId($user->getId());
                $cacheGain->setLastScan(new \DateTime);
                $cacheGain->setNbPoints($points);
                $cacheGain->setIsUpdated(false);

                $em->persist($cacheGain);

                $user->setPointsSofid($user->getPointsSofid() + 1);
                $em->persist($user);
            } else {
                //Blocage 10 minutes
                $timestamp = new \DateTime('-15 min');
                if ($gain->getLastScan() < $timestamp) {
                    $gain->setNbPoints($gain->getNbPoints() + $points);
                    $gain->setTimestamp(new \DateTime);
                    $gain->setLastScan(new \DateTime);
                    $gain->setShared(false);
                    $em->persist($gain);

                    $cacheGain->setCommercantId($commercant->getId());
                    $cacheGain->setUserId($user->getId());
                    $cacheGain->setLastScan(new \DateTime);
                    $cacheGain->setNbPoints($gain->getNbPoints());
                    $cacheGain->setIsUpdated(false);

                    $em->persist($cacheGain);

                    $user->setPointsSofid($user->getPointsSofid() + 1);
                    $em->persist($user);
                }
            }

            $em->flush();

            return new JsonResponse(array(
                'data' => array(
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'nbpts' => $gain->getNbPoints(),
                    'editable' => $commercant->getEditable(),
                    'random_data' => $user->getRandomData(),
                    'limitpoints1' => $commercant->getLimitpoints1(),
                    'limitpoints2' => $commercant->getLimitpoints2(),
                    'message_nb' => $commercant->getMessageManualPointsScreen()
                )
            ));
        }
    }

    public function scanByEmailOrPhoneV2Action()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));
        $email = $params['email'];
        $telephone = $params['telephone'];
        $idCommercant = $params['idcom'];

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneByEmailOrPhone($email, $telephone);

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $em = $this->getDoctrine()->getManager();

            $gain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Gain')
                    ->findOneBy(array('user' => $user->getId(), 'commercant' => $idCommercant));

            $commercant = $this->getDoctrine()
                    ->getRepository('SofidUserBundle:Commercant')
                    ->findOneBy(array('id' => $idCommercant));
             $conversionValue = $commercant->getConversionValue();
                if (empty($conversionValue)) {
                    $conversionValue = 1;
                }
            $cacheGain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:GainCache')
                    ->findOneBy(array('userId' => $user->getId(), 'commercantId' => $idCommercant));
            if (!$commercant) {
                return new JsonResponse(array('error' => '1'));
            }
            if (!$cacheGain) {
                $cacheGain = new GainCache();
            }

            $isEditable = $commercant->getEditable();

            if ($isEditable) {
                $points = 0;
            } else {
                $points = $commercant->getNbPointScan();
            }

            if (!$gain) {

                $gain = new Gain();
                $gain->setCommercant($commercant);
                $gain->setUser($user);
                $gain->setNbPoints($points);
                $gain->setTimestamp(new \DateTime);
                $gain->setLastScan(new \DateTime);
                $gain->setShared(false);
                $em->persist($gain);

                $cacheGain->setCommercantId($commercant->getId());
                $cacheGain->setUserId($user->getId());
                $cacheGain->setLastScan(new \DateTime);
                $cacheGain->setNbPoints($points);
                $cacheGain->setIsUpdated(false);
                $em->persist($cacheGain);

                $gainHistory = new GainHistory();
                $gainHistory->setCommercantId($commercant->getId());
                $gainHistory->setUserId($user->getId());
                $gainHistory->setLastScan(new \DateTime);
                $gainHistory->setNbPoints($points);
                $em->persist($gainHistory);

                $user->setPointsSofid($user->getPointsSofid() + 1);
                $em->persist($user);
            } else {

                //Blocage 10 minutes
                $timestamp = new \DateTime('-15 min');
                if ($gain->getLastScan() < $timestamp) {
                    $gain->setNbPoints($gain->getNbPoints() + $points);
                    $gain->setTimestamp(new \DateTime);
                    $gain->setLastScan(new \DateTime);
                    $gain->setShared(false);
                    $em->persist($gain);

                    $cacheGain->setCommercantId($commercant->getId());
                    $cacheGain->setUserId($user->getId());
                    $cacheGain->setLastScan(new \DateTime);
                    $cacheGain->setNbPoints($gain->getNbPoints());
                    $cacheGain->setIsUpdated(false);
                    $em->persist($cacheGain);

                    $gainHistory = new GainHistory();
                    $gainHistory->setCommercantId($commercant->getId());
                    $gainHistory->setUserId($user->getId());
                    $gainHistory->setLastScan(new \DateTime);
                    $gainHistory->setNbPoints($points);
                    $em->persist($gainHistory);

                    $user->setPointsSofid($user->getPointsSofid() + 1);
                    $em->persist($user);
                }
            }

            $em->flush();

            return new JsonResponse(array(
                'data' => array(
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'nbpts' => $gain->getNbPoints(),
                    'conversionValue' => $conversionValue,
                    'editable' => $commercant->getEditable(),
                    'random_data' => $user->getRandomData(),
                    'limitpoints1' => $commercant->getLimitpoints1(),
                    'limitpoints2' => $commercant->getLimitpoints2(),
                    'message_nb' => $commercant->getMessageManualPointsScreen(),
                    'merchant_name' => $commercant->getEntreprise(),
                    'merchant_address' => $commercant->getAdresse() . ' ' . $commercant->getCodePostal() . ' ' . $commercant->getVille()
                )
            ));
        }
    }

    public function updatePtsAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];
        $idCommercant = $params['idcom'];
        $manualPoints = '';
        if (isset($params['manualPoints'])) {
            $manualPoints = $params['manualPoints'];
        };
        $points = $params['nbpts'];
        $idOffre = $params['idoffre'];
        $type = $params['type'];

        $gain = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Gain')
                ->findOneBy(array('user' => $idUser, 'commercant' => $idCommercant));

        if (!$gain) {
            return new JsonResponse(array('error' => '1'));
        } else {

            if ($type == '0') {

                $offre = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:Palier')
                        ->findOneBy(array('id' => $idOffre));
                if (!empty($offre)) {
                    $recompensePoint = $offre->getNbPointPalier();
                }
            } else {

                $offre = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:Offre')
                        ->findOneBy(array('id' => $idOffre));
                if (!empty($offre)) {
                    $recompensePoint = $offre->getNbPointOffre();
                }
            }

            $em = $this->getDoctrine()->getManager();
            $timestamp = new \DateTime('-15 min');
            //  if ($gain->getLastScan() < $timestamp) {
            $gain->setNbPoints($points);
            $gain->setTimestamp(new \DateTime);
            $gain->setLastScan(new \DateTime);
            $gain->setShared(false);
            $em->persist($gain);

            $cacheGain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:GainCache')
                    ->findOneBy(array('userId' => $idUser, 'commercantId' => $idCommercant));
            if (!$cacheGain) {
                $cacheGain = new GainCache();
                $cacheGain->setCommercantId($idCommercant);
                $cacheGain->setUserId($user->getId());
            }
            $cacheGain->setLastScan(new \DateTime);
            $cacheGain->setNbPoints($points);
            $cacheGain->setIsUpdated(false);
            $em->persist($cacheGain);

            if (!empty($manualPoints)) {
                $gainHistory = new GainHistory();
                $gainHistory->setCommercantId($idCommercant);
                $gainHistory->setUserId($idUser);
                $gainHistory->setLastScan(new \DateTime);
                $gainHistory->setNbPoints($manualPoints);
                $em->persist($gainHistory);
            }
            $em->flush();
            //   }

            if (!$offre) {

                return new JsonResponse(array('result' => '2'));
            } else {

                $user = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:User')
                        ->findOneBy(array('id' => $idUser));

                $commercant = $this->getDoctrine()
                        ->getRepository('SofidUserBundle:Commercant')
                        ->findOneBy(array('id' => $idCommercant));

                $transaction = new Transaction();

                if ($type == '0') {
                    $transaction->setPalier($offre);
                } else {
                    $transaction->setOffre($offre);
                }
                $transaction->setCommercant($commercant);
                $transaction->setUser($user);

                $em->persist($transaction);
            }

            $lastUserScans = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:GainHistory')
                    ->findBy(array('userId' => $idUser, 'commercantId' => $idCommercant), array('lastScan' => 'DESC'), 5);

            $message = 'Bravo. "' . $offre->getRecompense() . '" ' . $gain->getTimestamp()->format('dmy H:i') . ' ' . $recompensePoint . 'p. Historique: ';

            foreach ($lastUserScans as $scan) {
                $message.=$scan->getLastScan()->format('dmy H:i') . ' ' . $scan->getNbPoints() . 'p' . '.';
            }

            $random = $user->getRandomData();
            if (!$random) {
                $tel = $user->getTelephone();

                $nexmoManager = $this->get("nexmo_sms_manager");
                $nexmoManager->send($tel, $message);
            }
            $em->flush();

            return new JsonResponse(array('result' => '1', 'sms' => $message));
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

//        $user = new User();

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('email' => $login));

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            if (hash('sha512', $pass) == $user->getPassword()) {
                return new JsonResponse(array('id' => $user->getId()));
            } else {
                return new JsonResponse(array('error' => '3'));
            }
        }
    }

    public function retrieveAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('id' => $idUser));

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            if ($user->getUsername() != null) {
                $username = $user->getUsername();
            } else {
                $username = "";
            }
            if ($user->getEmail() != null) {
                $email = $user->getEmail();
            } else {
                $email = "";
            }
            if ($user->getDateNaissance() != null) {
                $birthday = date_format($user->getDateNaissance(), 'd-m-Y');
            } else {
                $birthday = "";
            }
            if ($user->getTelephone() != null) {
                $tel = $user->getTelephone();
            } else {
                $tel = "";
            }

            $data = array('username' => $username, 'email' => $email, 'birth' => $birthday, 'telephone' => $tel);

            return new JsonResponse(array('data' => $data));
        }
    }

    public function editAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];

        if (isset($params['username'])) {
            $username = $params['username'];
        } else {
            $username = null;
        }

        if (isset($params['first_name'])) {
            $firstname = $params['first_name'];
        } else {
            $firstname = null;
        }

        if (isset($params['last_name'])) {
            $lastname = $params['last_name'];
        } else {
            $lastname = null;
        }

        if (isset($params['gender'])) {
            $gender = $params['gender'];
        } else {
            $gender = null;
        }

        if (isset($params['password'])) {
            $pass = $params['password'];
            $pass = hash('sha512', $pass);
        } else {
            $pass = null;
        }

        if (isset($params['email'])) {
            $email = $params['email'];
        } else {
            $email = null;
        }

        if (isset($params['telephone'])) {
            $tel = $params['telephone'];

            if (substr($tel, 0, 1) == '0') {
                $tel = '+33' . substr($tel, 1);
            }
        } else {
            $tel = null;
        }

        if (isset($params['birth'])) {
            $birthday = $params['birth'];
        } else {
            $birthday = null;
        }

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('id' => $idUser));

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $em = $this->getDoctrine()->getManager();

            if ($username) {
                $user->setUsername($username);
            }

            if ($firstname) {
                $user->setFirstname($firstname);
            }

            if ($lastname) {
                $user->setLastname($lastname);
            }

            if ($gender) {
                $user->setGender($gender);
            }

            if ($pass) {
                $user->setPassword($pass);
            }

            if ($email) {
                $user->setEmail($email);
            }

            if ($tel) {
                $user->setTelephone($tel);
            }

            if ($birthday) {
                $user->setDateNaissance(date_create($birthday));
            }

            if ($tel && $email) {
                $user->setRandomData(false);
            }

            $em->flush();

            return new JsonResponse(array('result' => '1'));
        }
    }

    public function registerAction()
    {

        $em = $this->getDoctrine()->getManager();

        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '1'));

        $firstname      = $params['first_name'];

        if(array_key_exists('last_name', $params)) {
            $lastname   = $params['last_name'];
        } else {
            $lastname   = null;
        }

        $gender         = $params['gender'];

        if(array_key_exists('birthday', $params)) {
            $birthday   = $params['birthday'];
        } else {
            $birthday   = null;
        }

        $mail           = $params['mail'];
        $tel            = $params['telephone'];
        $random_data    = $params['random_data'];

        if (isset($params['card'])) {

            $string = $params['card'];

            preg_match_all("/\:(.*?)\%/", $string, $resultArray);

            if(empty($resultArray[1])) {
                $idCard = $params['card'];
            } else {
                $idCard = $resultArray[1];
            }

            $card = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Card')
                ->findOneBy(array('encryptedId' => $idCard));

            if($card->getUser()) {
                return new JsonResponse(array('error' => 2, 'message' => 'Card already used'));
            }

            $result = array('qr_code' => $idCard);

        } else {
            $idCard = null;

            $card = new Card();

            $card->setType(Card::TYPE_MOBILE);

            $em->persist($card);
            $em->flush();

            $idCard = $card->getEncryptedId();

            $result = array('qr_code' => 'SOFID_ID:' . $card->getEncryptedId() . '%TYPE:' . Card::TYPE_MOBILE);
        }

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('email' => $mail));

        if ($user) {

            return new JsonResponse(array('error' => 1, 'message' => 'User already exists'));
        } else {

            $pos = strrpos($mail, '@');
            $username = substr($mail, 0, $pos);

            $password = hash('sha512', $username);

            if (substr($tel, 0, 1) == '0') {
                $tel = '+33' . substr($tel, 1);
            }

            $user = new User();

            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setGender($gender);
            $user->setDateNaissance(date_create($birthday));
            $user->setEmail($mail);
            $user->setTelephone($tel);
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRandomData($random_data);

            $em->persist($user);

            if ($idCard) {

                $card = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:Card')
                        ->findOneBy(array('encryptedId' => $idCard));

                if(!$card) {
                    return new JsonResponse(array('error' => 3));
                } else {
                    $card->setUser($user);

                    $em->persist($card);
                }
            }

            $em->flush();

            $message = 'Bienvenue sur SoFID. Identifiant : ' . $mail . ' Mot de passe : ' . $username . ' . Completez votre profil sur www.cartesofid.com/fidele.';

            $commercant = $this->getDoctrine()
                    ->getRepository('SofidUserBundle:Commercant')
                    ->findOneBy(array('username' => 'armellaminsi'));

            if (!$random_data) {
                $nexmoManager = $this->get("nexmo_sms_manager");
                $response = $nexmoManager->send($tel, $message);
            }

            return new JsonResponse(array('result' => '1', 'qr_code' => 'SOFID_ID:' . $card->getEncryptedId() . '%TYPE:MOBILE'));
        }
    }

    public function getMyCommercantsAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('id' => $idUser));

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $gains = $user->getGains();
            if ($gains) {

                $JsonCommercants = array();
                $response = array();

                foreach ($gains->toArray() as $gain) {
                    $commercant = $gain->getCommercant();

                    $adresse = sprintf("%s\n%s %s", $commercant->getAdresse(), $commercant->getCodePostal(), $commercant->getVille());

                    $response['entreprise'] = $commercant->getEntreprise();
                    $response['nbpts'] = $gain->getNbPoints();
                    $response['adresse'] = trim($adresse);
                    $response['editable'] = $commercant->getEditable();
                    $response['limitpoints1'] = $commercant->getLimitpoints1();
                    $response['limitpoints2'] = $commercant->getLimitpoints2();
                    $response['message_nb'] = $commercant->getMessageManualPointsScreen();
                    $response['image'] = $commercant->getPicture() ? 'http://www.cartesofid.com/uploads/commercants/' . $commercant->getId() . '/' . $commercant->getPicture() : 'http://www.cartesofid.com/uploads/commercants/sofid.png';
                    $JsonCommercants[] = $response;
                }
            }

            return new JsonResponse(array('data' => $JsonCommercants));
        }
    }

    public function shareAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];
        $timestamp = new \DateTime('-5 min');

        $user = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:User')
                ->findOneBy(array('id' => $idUser));

        if (!$user) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $em = $this->getDoctrine()->getManager();

            try {

                $lastGain = $this->getDoctrine()
                        ->getRepository('SofidAdminBundle:User')
                        ->getLastGain($timestamp, $idUser);
            } catch (\Doctrine\ORM\NoResultException $e) {
                return new JsonResponse(array('result' => '0'));
            }

            if ($lastGain['shared']) {
                return new JsonResponse(array('result' => '0'));
            }

            $gain = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Gain')
                    ->findOneBy(array('id' => $lastGain['id']));


            $commercant = $gain->getCommercant();

            if (!$gain || !$commercant)
                return new JsonResponse(array('error' => '0'));

            $gain->setNbPoints($gain->getNbPoints() + 5);
            $gain->setTimestamp(new \DateTime);
            $gain->setShared(true);

            $commercant->setShares($commercant->getShares() + 1);

            $user->setPointsSofid($user->getPointsSofid() + 10);

            $em->flush();

            return new JsonResponse(array('entreprise' => $commercant->getEntreprise()));
        }
    }

    public function getAllCommercantsAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];

        if(isset($params['pageid'])) {
            $pageId = $params['pageid'];
        } else {
            $pageId = 0;
        }

        $commercants = $this->getDoctrine()
                ->getRepository('SofidUserBundle:Commercant')
                ->getAllCommercants($pageId);

        $JsonCommercants = array();

        if ($commercants) {

            $response = array();

            foreach ($commercants as $commercant) {

                $adresse = sprintf("%s\n%s %s", $commercant['adresse'], $commercant['codePostal'], $commercant['ville']);

                if ($commercant['entreprise'] != null) {
                    $response['entreprise'] = $commercant['entreprise'];
                } else {
                    $response['entreprise'] = "";
                }
                $response['adresse'] = trim($adresse);

                $response['image'] = $commercant['picture'] ? 'http://www.cartesofid.com/uploads/commercants/' . $commercant['id'] . '/' . $commercant['picture'] : 'http://www.cartesofid.com/uploads/commercants/sofid.png';

                $gain = $this->getDoctrine()->getRepository('SofidAdminBundle:Gain')->getPointByMerchantAndUser($commercant['id'], $idUser);

                if($gain){
                    $response['nbPoint'] = $gain[0]->getNbPoints();
                } else {
                    $response['nbPoint'] = 0;
                }

                $JsonCommercants[] = $response;
            }
        }

        return new JsonResponse(array('data' => $JsonCommercants));
    }

    public function getCommercantAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2'));

        $idUser = $params['userid'];
        $idCommercant = $params['idcom'];

        $gain = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:Gain')
                ->findOneBy(array('user' => $idUser, 'commercant' => $idCommercant));

        if (!$gain) {

            return new JsonResponse(array('error' => '1'));
        } else {

            $commercant = $gain->getCommercant();

            if (!$commercant) {

                return new JsonResponse(array('error' => '1'));
            } else {

                $response = array();

                $response['entreprise'] = $commercant->getEntreprise();
                $response['nbpts'] = $gain->getNbPoints();
                $response['editable'] = $commercant->getEditable();
                $response['limitpoints1'] = $commercant->getLimitpoints1();
                $response['limitpoints2'] = $commercant->getLimitpoints2();
                $response['message_nb'] = $commercant->getMessageManualPointsScreen();
                $response['image'] = $commercant->getPicture() ? 'http://www.cartesofid.com/uploads/commercants/' . $commercant->getId() . '/' . $commercant->getPicture() : 'http://www.cartesofid.com/uploads/commercants/sofid.png';

                return new JsonResponse(array('data' => $response));
            }
        }
    }

    public function generateRandomEmail($length = 8)
    {

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        $randomString .= '@sofid.biz';

        return $this->checkIfIsUnique('email', $randomString);
    }

    public function generateRandomTelephone($length = 8)
    {
        $characters = '0123456789';
        $randomString = '+336';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $this->checkIfIsUnique('telephone', $randomString);
    }

    public function checkIfIsUnique($filter, $value)
    {
        $users = $this->getDoctrine()->getRepository('SofidAdminBundle:User')->findBy(array($filter => $value));
        if (empty($users)) {
            return $value;
        } elseif ($filter == 'email') {
            return $this->generateRandomEmail();
        }

        return $this->generateRandomTelephone();
    }

//    public function udpateQrCodeAllMerchantAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $commercants = $this->getDoctrine()
//            ->getRepository('SofidUserBundle:commercant')
//            ->findAll();
//
//        $salt = 'jhgggygkyuT45dsqqsdfqszefq54ds';
//        foreach( $commercants as $commercant) {
//            echo $commercant->getId() . '<br>';
//            $commercant->setCode(hash('sha512',($salt.$commercant->getId())));
//            $em->persist($commercant);
//        }
//        $em->flush();
//
//        echo "hello world";die;
//    }

    public function getCommercantOfferAndPointAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2', 'message' => 'No content available'));

        $idUser = $params['userid'];
        $idCommercant = $params['qrcom'];

        $user = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:User')
            ->findOneBy(array('id' => $idUser));

        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:commercant')
            ->findOneBy(array('code' => $idCommercant));

        if(!$commercant) {
            return new JsonResponse(array('error' => '5', 'message' => 'invalid qr code'));
        }

        $offers = array();
        $allOffers = array();
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');
        foreach ($commercant->getOffres() as $key => $offer) {
            if ($now->format('Y-m-d H:i:s') >= $offer->getDateLancement()->format('Y-m-d H:i:s')
                && $now->format('Y-m-d H:i:s') <= $offer->getDateFin()->format('Y-m-d H:i:s')) {
                $offers['id']               = $offer->getId();
                $offers['title']            = $offer->getTitle();
                $offers['number_of_points'] = $offer->getNbPointOffre();
                $offers['image']            = ($offer->getPath() != null) ? 'http://91.121.159.104/uploads/offer/' . $offer->getId() . '/' . $offer->getPath() : null;

                $allOffers[] = $offers;
            }
        }

        $data = array();
        $data['username']           = $commercant->getUsername();
        $data['firstname']          = $commercant->getFirstname();
        $data['lastname']           = $commercant->getLastname();
        $data['entreprise']         = $commercant->getEntreprise();
        $data['website']            = $commercant->getWebsite();
        $data['adresse']            = $commercant->getAdresse();
        $data['postal_code']        = $commercant->getCodePostal();
        $data['facebook_page']      = $commercant->getFacebookPage();
        $data['isManualPoints']     = $commercant->getEditable();
        $data['picture']            = ($commercant->getPicture() != null) ? 'http://91.121.159.104/uploads/commercants/' . $commercant->getId() . '/' . $commercant->getPicture() : null;

        if($commercant->getEditable() == 1) {
            $data['message_manual_points_screen'] = $commercant->getMessageManualPointsScreen();
            $data['conversion_value'] = $commercant->getConversionValue();
        }

        if($commercant->getQuestions()) {
            foreach($commercant->getQuestions() as $question) {
                if($question->getIsActive() == 1) {
                    $data['isPoolActive'] = 1;
                }
            }
        }

        $paliers = array();
        if($commercant->getPaliers()) {
            foreach($commercant->getPaliers() as $key => $palier) {
                $paliers[$key]['id'] = $palier->getId();
                $paliers[$key]['recompense'] = $palier->getRecompense();
                $paliers[$key]['num_palier'] = $palier->getNumPalier();
                $paliers[$key]['number_point_palier'] = $palier->getNbPointPalier();
            }
        }

        $gain = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:Gain')
            ->findOneBy(array('user' => $user->getId(), 'commercant' => $commercant->getId()));

        if($gain)
            $data['user_gain_points'] = $gain->getNbPoints();

        return new JsonResponse(array('data' => $data, 'offers' => $offers, 'paliers' => $paliers));

    }

    public function getCommercantByQrcodeAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2', 'message' => 'No content available'));

        $idCommercant = $params['qrcom'];

        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:commercant')
            ->findOneBy(array('code' => $idCommercant));

        $data = array();
        $data['id']                 = $commercant->getId();
        $data['username']           = $commercant->getUsername();
        $data['firstname']          = $commercant->getFirstname();
        $data['lastname']           = $commercant->getLastname();
        $data['entreprise']         = $commercant->getEntreprise();
        $data['website']            = $commercant->getWebsite();
        $data['adresse']            = $commercant->getAdresse();
        $data['postal_code']        = $commercant->getCodePostal();
        $data['facebook_page']      = $commercant->getFacebookPage();
        $data['isManualPoints']     = $commercant->getEditable();
        if($commercant->getEditable() == 1) {

        }

        if($commercant->getQuestions()) {
            foreach($commercant->getQuestions() as $question) {
                if($question->getIsActive() == 1) {
                    $data['isPoolActive'] = 1;
                 }
            }
        }

        return new JsonResponse(array('data' => $data));

    }

    public function getCommercantOfferAndPointForTabletAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2', 'message' => 'No content available'));

        $idUser = $params['userid'];
        $idCommercant = $params['merchantid'];

        $user = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:User')
            ->findOneBy(array('id' => $idUser));

        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:commercant')
            ->findOneBy(array('id' => $idCommercant));

        $offers = array();
        $allOffers = array();
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');
        foreach ($commercant->getOffres() as $key => $offer) {
            if ($now->format('Y-m-d H:i:s') >= $offer->getDateLancement()->format('Y-m-d H:i:s')
                && $now->format('Y-m-d H:i:s') <= $offer->getDateFin()->format('Y-m-d H:i:s')) {
                $offers['id']               = $offer->getId();
                $offers['title']            = $offer->getTitle();
                $offers['number_of_points'] = $offer->getNbPointOffre();
                $offers['image']            = ($offer->getPath() != null) ? 'http://91.121.159.104/uploads/offer/' . $offer->getId() . '/' . $offer->getPath() : null;

                $allOffers[] = $offers;
            }
        }

        $data = array();
        $data['username']           = $commercant->getUsername();
        $data['firstname']          = $commercant->getFirstname();
        $data['lastname']           = $commercant->getLastname();
        $data['entreprise']         = $commercant->getEntreprise();
        $data['website']            = $commercant->getWebsite();
        $data['adresse']            = $commercant->getAdresse();
        $data['postal_code']        = $commercant->getCodePostal();
        $data['facebook_page']      = $commercant->getFacebookPage();
        $data['user_point_sofid']   = $user->getPointsSofid();

        return new JsonResponse(array('data' => $data, 'offers' => $allOffers));

    }

    public function proposalAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '2', 'message' => 'No content available'));

        $em = $this->getDoctrine()->getManager();

        $proposals = new Proposals();

        if (isset($params['city'])) {
            $city = $params['city'];
        } else {
            $city = null;
        }

        if(isset($params['category'])) {
            $category = $params['category'];
        } else {
            $category = null;
        }

        if(isset($params['merchant'])) {
            $merchant = $params['merchant'];
        } else {
            $merchant = null;
        }

        if(isset($params['phone'])) {
            $phone = $params['phone'];
        } else {
            $phone = null;
        }

        if(isset($params['address'])) {
            $address = $params['address'];
        } else {
            $address = null;
        }

        if(isset($params['email'])) {
            $email = $params['email'];
        } else {
            $email = null;
        }

        if(isset($params['offer'])) {
            $offer = $params['offer'];
        } else {
            $offer = null;
        }

        $proposals->setCity($city);
        $proposals->setCategory($category);
        $proposals->setMerchant($merchant);
        $proposals->setPhone($phone);
        $proposals->setAddress($address);
        $proposals->setEmail($email);
        $proposals->setOffer($offer);
        $created = new \DateTime("now");
        $proposals->setCreated($created);

        $em->persist($proposals);
        $em->flush();

//        $message = \Swift_Message::newInstance()
//            ->setSubject('Hello Email')
//            ->setFrom('send@example.com')
//            ->setTo('saeed.sas@gmail.com')
//            ->setBody(
//                $this->renderView(
//                    'SofidAdminBundle:User:proposal.html.twig',
//                    array('data' => $params)
//                )
//            )
//        ;
//        $this->get('mailer')->send($message);

        return new JsonResponse(array('result' => 1));
    }

    public function duplicateMerchantAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:Commercant')
            ->findOneBy(array('id' => $id));

        if($commercant) {
            $newCommercant = new Commercant();

            $newCommercant->setFirstname($commercant->getFirstname());
            $newCommercant->setLastname($commercant->getLastname());
            $newCommercant->setUsername($commercant->getUsername(). '_duplicate');
            $newCommercant->setUsernameCanonical($commercant->getUsernameCanonical(). '_duplicate');
            $newCommercant->setEmail($commercant->getEmail() . '_duplicate');
            $newCommercant->setEmailCanonical($commercant->getEmailCanonical(). '_duplicate');
            $newCommercant->setEnabled(true);
            $newCommercant->setDateOfBirth($commercant->getDateOfBirth());
            $newCommercant->setClient(($commercant->getClient()));
            $newCommercant->setSms($commercant->getSms());
            $newCommercant->setCategory($commercant->getCategory());
            $newCommercant->setTicketMoyen($commercant->getTicketMoyen());
            $newCommercant->setTicketEphemMoyen($commercant->getTicketEphemMoyen());
            $newCommercant->setWebsite($commercant->getWebsite());
            $newCommercant->setFacebookPage($commercant->getFacebookPage());
            $newCommercant->setGender($commercant->getGender());
            $newCommercant->setPhone($commercant->getPhone());
            $newCommercant->setNbPointScan($commercant->getNbPointScan());
            $newCommercant->setShares($commercant->getShares());
            $newCommercant->setEntreprise($commercant->getEntreprise());
            $newCommercant->setEditable(true);
            $newCommercant->setDisplayEditable($commercant->getDisplayEditable());
            $newCommercant->setExportOption($commercant->getExportOption());
            $newCommercant->setMessageManualPointsScreen($commercant->getMessageManualPointsScreen());
            $newCommercant->setLimitpoints1($commercant->getLimitpoints1());
            $newCommercant->setLimitpoints2($commercant->getLimitpoints2());
            $newCommercant->setRaisonSociale($commercant->getRaisonSociale());
            $newCommercant->setAdresse($commercant->getAdresse());
            $newCommercant->setConversionValue($commercant->getConversionValue());
            $newCommercant->setCodePostal($commercant->getCodePostal());
            $newCommercant->setVille($commercant->getVille());
            $newCommercant->setPays($commercant->getPays());

            $em->persist($newCommercant);

            $em->flush();

            return $this->redirect($this->generateUrl('sonata_admin_dashboard'), 301);

        }
    }

    public function timeSpentLogAction()
    {
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
        } else
            return new JsonResponse(array('error' => '1', 'message' => 'No content available'));

        $em = $this->getDoctrine()->getManager();

        $idUser = $params['userid'];
        $idCommercant = $params['merchantid'];
        $start = $params['start'];
        $end = $params['end'];

        $commercant = $this->getDoctrine()
            ->getRepository('SofidUserBundle:Commercant')
            ->findOneBy(array('id' => $idCommercant));

        if(!$commercant) {
            return new JsonResponse(array('error' => '2', 'message' => 'Merchant does not exists'));
        }

        $user = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:User')
            ->findOneBy(array('id' => $idUser));

        if(!$user) {
            return new JsonResponse(array('error' => '2', 'message' => 'User does not exists'));
        }

        $to_time = strtotime($start);
        $from_time = strtotime($end);
        $duration = round(abs($to_time - $from_time) / 60,2);
        $log = new TimeSpentLog();

        $log->setUser($user);
        $log->setCommercant($commercant);
        $log->setStart($start);
        $log->setEnd($end);
        $log->setDuration($duration);

        $em->persist($log);
        $em->flush();

        return new JsonResponse(array('result' => 1));
    }

}
