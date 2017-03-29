<?php
/**
 * Created by PhpStorm.
 * User: bahar
 * Date: 6/15/14
 * Time: 12:49 AM
 */

namespace Sofid\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class CityController extends Controller{

    public function retrieveAction() {
        $cities = array();

        $objCities = $this->getDoctrine()
                ->getRepository('SofidAdminBundle:City')
                ->findAll();

        if(!$objCities) {
            return new JsonResponse(array('error' => '1'));
        }
        else {
            foreach($objCities as $city) {
                $cities['logo'] = $city->getLogo();
                $cities['url1'] = $city->getUrl1();
                $cities['ulr2'] = $city->getUrl2();
                $cities['url3'] = $city->getUrl3();
                $jsonCity[] = $cities;
            }
        }
        return new JsonResponse($jsonCity);
    }
    public function getSingleCityAction($id) {
        $city = $this->getDoctrine()
            ->getRepository('SofidAdminBundle:City')
            ->findOneById($id);
        if(!$city) {
            return new JsonResponse(array('error' => '1'));
        }
        else {
            if($city->getLogo() != null) {
                $logo = $city->getLogo();
            }
            else{
                $logo = "";
            }
            if($city->getUrl1() != null) {
                $url1 = $city->getUrl1();
            }
            else{
                $url1 = "";
            }
            if($city->getUrl2() != null) {
                $url2 = $city->getUrl2();
            }
            else{
                $url2 = "";
            }
            if($city->getUrl2() != null) {
                $url3 = $city->getUrl3();
            }
            else{
                $url3 = "";
            }
        }
        $arrCity = array('logo' => $logo, 'url1' => $url1, 'url2' => $url2, 'url3' => $url3);
        return new JsonResponse(array('data' => $arrCity));
    }
    public function editCityAction($id) {

    }
}

