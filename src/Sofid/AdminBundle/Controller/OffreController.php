<?php

namespace Sofid\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sofid\AdminBundle\Entity\Offre;

class OffreController extends Controller {

    public function offresAction() {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $commercant = $token->getUser();


        return $this->render('SofidCommercantBundle:commercant:offres.html.twig');
    }

    public function retrieveOffresAction(Request $request) {

        if ($request->isXmlHttpRequest()) {

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $offres = $commercant->getOffres();

            if ($offres) {

                $JsonOffres = array();
                $response = array();

                foreach ($offres->toArray() as $offre) {
                    $response['id'] = $offre->getId();
                    $response['title'] = $offre->getTitle();
                    $response['startday'] = $offre->getDateLancement()->format("d");
                    $response['startmonth'] = $offre->getDateLancement()->format("m");
                    $response['startyear'] = $offre->getDateLancement()->format("Y");
                    $response['starthour'] = $offre->getDateLancement()->format("H");
                    $response['startminute'] = $offre->getDateLancement()->format("i");

                    $response['endday'] = $offre->getDateFin()->format("d");
                    $response['endmonth'] = $offre->getDateFin()->format("m");
                    $response['endyear'] = $offre->getDateFin()->format("Y");
                    $response['endhour'] = $offre->getDateFin()->format("H");
                    $response['endminute'] = $offre->getDateFin()->format("i");

                    $response['nbpts'] = $offre->getNbPointOffre();
                    $response['recompense'] = $offre->getRecompense();
                    $response['img'] = $offre->getPath();
                    $response['commentaires'] = $offre->getCommentaires();
                    $JsonOffres[] = $response;
                }
            }

            return new JsonResponse($JsonOffres);
        } else {

            return new JsonResponse(array('error' => 1));
        }
    }

    public function addOffresAction(Request $request) {

        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $offre = new Offre();

            $offre->setTitle($request->request->get('title'));
            $offre->setRecompense($request->request->get('recompense'));
            $offre->setCommentaires($request->request->get('commentaires'));
            $offre->setNbPointOffre($request->request->get('nbpts'));
            $offre->setDateLancement(new \DateTime($request->request->get('start')));
            $offre->setDateFin(new \DateTime($request->request->get('end')));

            foreach ($request->files as $uploadedFile) {
                if ($uploadedFile) {
                    $filename = sha1(uniqid(mt_rand(), true));
                    $path = '/uploads/commercants/' . $token->getUser()->getId() . '/offres/' . $filename . '.' . $uploadedFile->guessExtension();
                    $directory = __DIR__ . '/../../../../web/uploads/commercants/' . $token->getUser()->getId() . '/offres';
                    $uploadedFile->move($directory, $path);
                    $offre->setPath($path);
                }
            }

            $offre->setCommercant($commercant);

            $em->persist($offre);
            $em->flush();

            return new JsonResponse(array('id' => $offre->getId()), 200, array('Content-Type', 'text/html'));
        } else {

            return new JsonResponse(array('error' => 0));
        }
    }

    public function updateOffresAction(Request $request) {

        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $offre = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Offre')
                    ->findOneBy(array('id' => $request->request->get('id')));

            if (($offre) && ($offre->getCommercant() == $commercant)) {

                $offre->setTitle($request->request->get('title'));
                $offre->setRecompense($request->request->get('recompense'));
                $offre->setCommentaires($request->request->get('commentaires'));
                $offre->setNbPointOffre($request->request->get('nbpts'));
                $offre->setDateLancement(new \DateTime($request->request->get('start')));
                $offre->setDateFin(new \DateTime($request->request->get('end')));

                foreach ($request->files as $uploadedFile) {
                    if ($uploadedFile) {
                        $filename = sha1(uniqid(mt_rand(), true));
                        $path = '/uploads/commercants/' . $token->getUser()->getId() . '/offres/' . $filename . '.' . $uploadedFile->guessExtension();
                        $directory = __DIR__ . '/../../../../web/uploads/commercants/' . $token->getUser()->getId() . '/offres';
                        $uploadedFile->move($directory, $path);
                        $offre->setPath($path);
                    }
                }

                $em->flush();

                return new JsonResponse(array('id' => $offre->getId()), 200, array('Content-Type', 'text/html'));
            } else {

                return new JsonResponse(array('error' => 1));
            }
        } else {

            return new JsonResponse(array('error' => 0));
        }
    }

    public function deleteOffresAction(Request $request) {

        if ($request->isXmlHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            $securityContext = $this->get('security.context');
            $token = $securityContext->getToken();
            $commercant = $token->getUser();

            $offre = $this->getDoctrine()
                    ->getRepository('SofidAdminBundle:Offre')
                    ->findOneBy(array('id' => $request->request->get('id')));

            if (($offre) && ($offre->getCommercant() == $commercant)) {

                $em->remove($offre);

                $em->flush();

                return new JsonResponse(array('result' => 1));
            } else {

                return new JsonResponse(array('error' => 1));
            }
        } else {

            return new JsonResponse(array('error' => 0));
        }
    }

    public function getAllOffersAction()
    {
        $offers = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:Offre')
            ->findAll();

        $datas = array();
        $data = array();
        $now = new \DateTime();
        $now->format('Y-m-d H:i:s');

        foreach($offers as $offer) {
            if( $now->format('Y-m-d H:i:s') >= $offer->getDateLancement()->format('Y-m-d H:i:s')
               && $now->format('Y-m-d H:i:s') <= $offer->getDateFin()->format('Y-m-d H:i:s')) {
                $datas['id']                = $offer->getId();
                $datas['title']             = $offer->getTitle();
                $datas['recompense']        = $offer->getRecompense();
                $datas['nb_point_offre']    = $offer->getNbPointOffre();
                $datas['commentaires']      = $offer->getCommentaires();
                $datas['date_fin']          = $offer->getDateFin()->format('Y-m-d H:i:s');
                $datas['date_lancement']    = $offer->getDateLancement()->format('Y-m-d H:i:s');
                $datas['image_path']        = ($offer->getPath() != null) ? 'http://www.cartesofid.com/uploads/offer/' . $offer->getId() . '/' . $offer->getPath() : 'http://91.121.159.104/uploads/offer/logo.png';
                $datas['mercant']           = $offer->getCommercant()->getEntreprise();
                $datas['address']           = $offer->getCommercant()->getAdresse();
                $datas['Code_postal']       = $offer->getCommercant()->getCodePostal();
                $datas['Ville']             = $offer->getCommercant()->getVille();

                if(is_object($offer->getCommercant()->getCategory()) && method_exists('get', $offer->getCommercant())) {
                    $datas['category']      = $offer->getCommercant()->getCategory()->getCategoryName();
                } else {
                    $datas['category'] = null;
                }

                $data[] = $datas;
            }
        }

        return new JsonResponse(array('data' => $data));

    }

}