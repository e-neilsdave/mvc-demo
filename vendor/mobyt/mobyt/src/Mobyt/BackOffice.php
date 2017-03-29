<?php

namespace Mobyt;


/**
 * Classe pour la gestion des activités de BackOffice
 *
 * Les paramétres utilisés par défaut sont les suivants :
 * -	Authentification : <b> Adresse IP + mot de passe en clair</b>
 *
 * @package Mobyt-ModuleHTTP
 * @example ContréleOpérations.php
 *
 *
 **/
class BackOffice
{
	/**#@+
	 * @access	private
	 * @var		string
	 */
	var $auth = 2;
	var $smsusername;
	var $smspassword;
	var $domaine = 'http://multilevel.mobyt.fr';
	/**#@-*/

	/**
	 * @param string	Username di accesso (Login)
	 * @param string	Password di accesso
	 *
	 */
	function BackOffice($login, $pwd)
	{
		$this->smsusername = $login;
		$this->smspassword = $pwd;
	}

	function setUser($smsusername)
	{
		$this->smsusername = $smsusername;
	}

	function setPW($smspassword)
	{
		$this->smspassword = $smspassword;
	}

	function getUser()
	{
		return $this->smsusername;
	}

	function getPW()
	{
		return $this->smspassword;
	}

	/**
	 * Configurer  l'adresse URL du domaine de léadministrateur/revendeur au quel les éventuels clients devront accéder
	 * L'URL doit figurer au format 'http://www.mondomaine.fr'
	 *
	 * @param string    URL
	 */
	function setDomaine($domaine)
	{
		$this->domaine = $domaine;
	}

	/**
	 * Utiliser l'authentification avec mot de passe
	 */
	function setAuthPlain()
	{
		$this->auth = 2;
	}

	/**
	 * Utiliser l'authentification basée sur hash md5
	 */
	function setAuthMd5()
	{
		$this->auth = 1;
	}


	/**Création déun nouveau client
	 * @param string Nom du client é créer
	* @param string Nom déutilisateur que le client utilisera pour séauthentifier
	* @param string Mot de passe que le client utilisera pour séauthentifier
	* @param array Autres informations optionnelles (email, domaine, identifiant tarifé)
	*
	* @returns string En cas de succés éOK <id du nouveau client créé>. En cas dééchec
	* éKO <message déerreur>
	*
	* @example CreerClient.php
	*
	*/
	function clientAdd($name, $username, $password, $options)
	{

		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'name'		=> $name,
				'username'		=> $username,
				'password'		=> $password
		);
			
		$fields['email'] = isset($options['email']) ? $options['email'] : '';
		$fields['tpl_id'] = isset($options['tpl_id']) ? $options['tpl_id'] : '';
		$fields['contact'] = isset($options['contact']) ? $options['contact'] : '';
		$fields['ref_id'] = isset($options['ref_id']) ? $options['ref_id'] : '';
		$fields['reseller'] = isset($options['reseller']) ? $options['reseller'] : '';
		$fields['vhost'] = isset($options['vhost']) ? $options['vhost'] : '';

		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/client-add.php';

		return trim($this->httpPost($fields));
	}

	/** Attribution crédits au client spécifié
	 *  @param string Identifiant du client auquel le crédit doit étre attribué
	 * 	@param string Identifiant univoque du tarif
	 *  @param array Autres informations optionnelles (crédit)
	 *
	 *  @returns string En cas de succés éOK<id du nouveau crédit>é . <br>
	 *  En cas dééchec éKO <message déerreur>
	 *
	 * @example AttribuerCredits.php
	 *
	 */
	function creditAdd($u_id,$bill_id,$options){

		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'u_id'        => $u_id,
				'bill_id'     => $bill_id
		);

		$fields['credit'] = isset($options['credit']) ? $options['credit'] : '';

		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/credit-add.php';

		return trim($this->httpPost($fields));
	}

	/** Contréle du crédit résiduel déun client
	 * @param string Identifiant univoque du client dont le crédit résiduel doit étre
	 * contrélé
	 *
	 * @returns string En cas de succés éOK <crédit en euro>é. En cas dééchec éKO
	 * <message déerreur>
	 *
	 * @example ControleCredits.php
	 *
	 */
	function creditCheck($u_id){

		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'u_id'        => $u_id
		);

		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/credit-get.php';
			
		return trim($this->httpPost($fields));
	}

	/** Contréle des opérations de BackOffice effectuées
	 * @param string Typologie déopération effectuée (écreditsé est la seule supportée
	 * dans léétat actuel des choses)
	 * @param array Autres informations optionnelles (identifiant client, date début
	 * report, date fin report)
	 *
	 * @returns array En cas de succés il y aura en retour un report dont la premiére
	 * ligne contient léen-téte des champs et les suivantes contiennent les données. Les 	  * champs sont séparés par des tabulations et les lignes terminent par les
	 * caractéres é<CR><LF>é . En cas dééchec éKO <message déerreur>
	 *
	 * @example ControleOperations.php
	 *
	 */
	function operationCheck($type, $options){

		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'type'        => $type
		);

		$fields['u_id'] = isset($options['u_id']) ? $options['u_id'] : '';
		$fields['from'] = isset($options['from']) ? $options['from'] : '';
		$fields['to'] = isset($options['to']) ? $options['to'] : '';
			
		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/userlog-get.php';
			
		return trim($this->httpPost($fields));
	}

	/** Création/Attribution du service de réception
	 * @param string Identifiant du client auquel le service doit étre attribué
	 * @param string Numéro de téléphone réception
	 * @param string Numéro de codes é créer
	 *
	 * @returns string En cas de succés éOK <codes créés>é. <br>  En cas dééchec éKO
	 * <message déerreur>
	 *
	 * @example Reception.php
	 *
	 */
	function Reception($u_id,$dest,$options){
			
		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'u_id'        => $u_id,
				'dest'        => $dest
		);

		$fields['num'] = isset($options['num']) ? $options['num'] : '';
			
		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/recv-add.php';
			
		return trim($this->httpPost($fields));
	}


	/** Suspension du service de réception
	 *	@param string Identifiant du client dont le service doit étre suspendu
	 *	@param string Numéro de téléphone réception
	 *	@param string Code de partage é suspendre
	 *
	 *	@returns string En cas de succés éOKé . <br>  En cas dééchec éKO <message
	 * déerreur>
	 *
	 *	@example ReceptionDel.php
	 *
	 */
	 
	function receptionDelete($u_id,$dest,$sharecode){
			
		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'u_id'        => $u_id,
				'dest'        => $dest,
				'sharecode'   => $sharecode
		);

			
			
		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/recv-del.php';
			
		return trim($this->httpPost($fields));
	}

	/** Activation/Désactivation déun client
	 *	@param string Identifiant du client é activer/désactiver
	 *	@param integer 0 = désactiver / 1 = activer
	 *
	 *	@returns string En cas de succés ééOK <statut client>é . <br> En cas dééchec éKO
	 *	<message déerreur>
	 *
	 *	@example ClientManagement.php
	 *
	 */
	function clientManage($u_id, $active){

		$fields = array(
				'smsusername' => $this->smsusername,
				'smspassword' => $this->smspassword,
				'u_id'        => $u_id,
				'active'        => $active
		);

		$fields['domaine'] = $this->domaine;
		$fields['path'] = '/backoffice/client-status.php';
			
		return trim($this->httpPost($fields));
	}

	/**
	 * Send an HTTP POST request, choosing either cURL or fsockopen
	 *
	 * @access private
	 */
	function httpPost($fields)
	{
		$qs = array();
		foreach ($fields as $k => $v)
			$qs[] = $k.'='.urlencode($v);
		$qs = join('&', $qs);


		if (function_exists('curl_init'))
			return BackOffice::httpPostCurl($qs, $fields['domaine'].$fields['path']);

		$errno = $errstr = '';
		if ($fp = @fsockopen("'".substr($fields['domaine'], 6)."'", 80, $errno, $errstr, 30))
		{
			fputs($fp, "POST ".$fields['path']." HTTP/1.0\r\n");
			fputs($fp, "Host: ".substr($fields['domaine'], 6)."\r\n");
			fputs($fp, "User-Agent: phpMobytSms/1.4.11\r\n");
			fputs($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
			fputs($fp, "Content-Length: ".strlen($qs)."\r\n");
			fputs($fp, "Connection: close\r\n");
			fputs($fp, "\r\n".$qs);
				
			$content = '';
			while (!feof($fp))
				$content .= fgets($fp, 1024);
				
			fclose($fp);
				
			return preg_replace("/^.*?\r\n\r\n/s", '', $content);
		}

		return false;
	}

	/**
	 * Send an HTTP POST request, through cURL
	 *
	 * @access private
	 */
	function httpPostCurl($qs, $domaine)
	{
		if ($ch = @curl_init($domaine))
		{
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'phpMobytSms/1.4.11 (curl)');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $qs);

			return curl_exec($ch);
		}

		return false;
	}

}

?>