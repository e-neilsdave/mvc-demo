<?php
/**
 * Logith�que pour l�envoi de SMS � la demande de POST/GET HTTP
*
*
* @version 1.4.11
* @package Mobyt-ModuleHTTP
* @auteurs
*		Simone Coreggioli 	- 	simone.coreggioli@mobyt.it
*		Matteo Beccati 		- 	matteo.beccati@mobyt.it
*
* @copyright (C) 2003-2010 Mobyt srl
* @licence https://www.mobyt.it/bsd-license.html BSD License
*
*/

namespace Mobyt;

/**#@+
 * @access	private
 */
/**
 * Version de la classe
 */
define('MOBYT_PHPSMS_VERSION',	'1.4.11');

/**
 * Type d�authentification bas�e sur hash md5
*/
define('MOBYT_AUTH_MD5',	1);

/**
 * Type d�authentification bas�e sur IP avec mot de passe lisible
*/
define('MOBYT_AUTH_PLAIN',	2);

/**
 * Qualit� messages Direct
*/
define('MOBYT_QUALITY_DRT',	3);

/**
 * Qualit� messages  TOP
*/
define('MOBYT_QUALITY_TOP',	4);
/**
 * Qualit� messages Default
*/
define('MOBYT_QUALITY_DEFAULT',	5);
/**
 * Qualit� messages  Low Cost
*/
define('MOBYT_QUALITY_LOWCOST',	6);

/**
 * @global array Array de conversion pour les qualit�s
*/
$GLOBALS['mobyt_qty'] = array(
		MOBYT_QUALITY_DRT		=> 'l',
		MOBYT_QUALITY_TOP		=> 'n',
		MOBYT_QUALITY_LOWCOST   => 'll',
		MOBYT_QUALITY_DEFAULT		=> 'd'

);

/**#@-*/

/**
 * Classe pour les messages re�us � travers Web Service SOAP
 *
 * Le contr�le des messages re�us n�cessite l'utilisation de la classe NuSOAP, distribu�e sous licence GNU Lesser
 * Public License (LGPL). Le fichier lib-nusoap.inc.php doit �tre copi� dans la m�me
 * directory de lib-mobytsms.inc.php pour garantir le bon fonctionnement du service.
 *
 * Les param�tres utilis�s par d�faut sont les suivants:
 * - Authentification: <b>Bas�e sur adresse IP et mot de passe lisible</b>
 *
 * @package Mobyt-ModuleHTTP
 * @example ControleSMS-SOAP.php Contr�le des messages re�us
 *
 */
class mobytSOAP
{
	/**
	 * @param string	Eventuel message d'erreur
	 */
	var $errorMessage = '';

	/**#@+
	 * @access	private
	 * @var		string
	 */
	var $login;
	var $pwd;
	var	$auth = MOBYT_AUTH_PLAIN;
	var $domaine = 'http://multilevel.mobyt.fr';
	var $dotnet = 0;
	/**#@-*/


	/**
	 * @param string	Nom de l�utilisateur (Identifiant)
	 * @param string	Mot de passe
	 */
	function mobytSOAP($login, $pwd)
	{
		$this->login = $login;
		$this->pwd = $pwd;
	}


	/**
	 * Configurer  l'adresse URL du domaine de l�administrateur/revendeur au quel les �ventuels clients devront acc�der
	 * L'URL doit figurer au format 'http://www.mondomaine.fr'
	 *
	 * @param string    URL
	 */
	function setDomaine($domaine)
	{
		$this->domaine = $domaine;
	}

	/**
	 * Utiliser l'authentification avec mot de passe lisible
	 */
	function setAuthPlain()
	{
		$this->auth = MOBYT_AUTH_PLAIN;
	}

	/**
	 * Utiliser l'authentification bas�e sur hash md5
	 */
	function setAuthMd5()
	{
		$this->auth = MOBYT_AUTH_MD5;
	}

	/**
	 * Convertir la date au format .Net compatible
	 */
	function setDate()
	{
		$this->dotnet = 1;
	}


	/**
	 *
	 *
	 * @param string    Num�ro di r�ception
	 * @param string    Code de partage
	 * @param string    Nombre de messages � afficher
	 *
	 *
	 * @returns mixed array de structure recvSms (int Id message, string Num�ro de l'exp�diteur, string Texte du message,
	 * dateTime Date et heure de r�ception)
	 *
	 * @example ControleSMS-SOAP.php Contr�le des messages re�us
	 */
	function receiveSms($rcpt, $sharecode, $messages)
	{
		require_once('lib-nusoap.inc.php');

		if (is_array($rcpt))
			$rcpt = join(',', $rcpt);

		$params = array(
				'user'		=> $this->login,
				//'pass'	    => $this->pwd,
				'rcpt'		=> $rcpt,
				'sharecode'	=> $sharecode,
				'pass'	=> $this->auth == MOBYT_AUTH_MD5 ? '' : $this->pwd,
				'ticket'	=> $this->auth == MOBYT_AUTH_MD5 ? md5($this->login.$rcpt.$sharecode.md5($this->pwd)) : '',
				'messages'	=> $messages
		);


		$client = new soapclient($this->domaine.'/wsdl/?wsdl', true);

		if ($err = $client->getError())
			trigger_error('Erreur dans la cr�ation du client SOAP: '.$err, E_USER_ERROR);

		$res = $client->call('receiveSms', array_values($params));

		if ($client->fault)
			return join(' ', $res);

		return $res;
	}
}

?>