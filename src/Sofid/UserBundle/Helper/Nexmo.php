<?php
/**
 * Author: Saeed Ahmed
 * Email: saeed.sas@gmail.com
 * Date: 3/2/14
 */

namespace Sofid\UserBundle\Helper;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Nexmo {

    /** @var ContainerInterface */
    protected $container;

    /** SMS directions */
    const NEXMO_API_URL = 'https://rest.nexmo.com/sms/json';
    const SMS_FORM = 'SoFid-dev';
    const NEXMO_API_KEY = '14e2bf48';
    const NEXMO_API_SECRET = 'd9d01746';

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function send($number, $message) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::NEXMO_API_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            'api_key='.self::NEXMO_API_KEY.'&api_secret='.self::NEXMO_API_SECRET.'&from='.self::SMS_FORM.'&to='.$number.'&text=
            '. $message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $serverOutput = curl_exec($ch);

        $err = curl_errno ( $ch );
        $errmsg = curl_error ( $ch );
        $header = curl_getinfo ( $ch );
        $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

        $header ['errno'] = $err;
        $header ['errmsg'] = $errmsg;
        $header ['content'] = $serverOutput;
        $header ['httpCode'] = $httpCode;

        curl_close ($ch);

        return $header;
    }
}