<?php

namespace Mobyt;


/**
 * Classe pour la gestion des activit�s de BackOffice
 *
 * Les param�tres utilis�s par d�faut sont les suivants :
 * -	Authentification : <b> Adresse IP + mot de passe en clair</b>
 *
 * @package Mobyt-ModuleHTTP
 * @example Contr�leOp�rations.php
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
	 * Utiliser l'authentification avec mot de passe
	 */
	function setAuthPlain()
	{
		$this->auth = 2;
	}

	/**
	 * Utiliser l'authentification bas�e sur hash md5
	 */
	function setAuthMd5()
	{
		$this->auth = 1;
	}


	/**Cr�ation d�un nouveau client
	 * @param string Nom du client � cr�er
	* @param string Nom d�utilisateur que le client utilisera pour s�authentifier
	* @param string Mot de passe que le client utilisera pour s�authentifier
	* @param array Autres informations optionnelles (email, domaine, identifiant tarif�)
	*
	* @returns string En cas de succ�s �OK <id du nouveau client cr��>. En cas d��chec
	* �KO <message d�erreur>
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

	/** Attribution cr�dits au client sp�cifi�
	 *  @param string Identifiant du client auquel le cr�dit doit �tre attribu�
	 * 	@param string Identifiant univoque du tarif
	 *  @param array Autres informations optionnelles (cr�dit)
	 *
	 *  @returns string En cas de succ�s �OK<id du nouveau cr�dit>� . <br>
	 *  En cas d��chec �KO <message d�erreur>
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

	/** Contr�le du cr�dit r�siduel d�un client
	 * @param string Identifiant univoque du client dont le cr�dit r�siduel doit �tre
	 * contr�l�
	 *
	 * @returns string En cas de succ�s �OK <cr�dit en euro>�. En cas d��chec �KO
	 * <message d�erreur>
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

	/** Contr�le des op�rations de BackOffice effectu�es
	 * @param string Typologie d�op�ration effectu�e (�credits� est la seule support�e
	 * dans l��tat actuel des choses)
	 * @param array Autres informations optionnelles (identifiant client, date d�but
	 * report, date fin report)
	 *
	 * @returns array En cas de succ�s il y aura en retour un report dont la premi�re
	 * ligne contient l�en-t�te des champs et les suivantes contiennent les donn�es. Les 	  * champs sont s�par�s par des tabulations et les lignes terminent par les
	 * caract�res �<CR><LF>� . En cas d��chec �KO <message d�erreur>
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

	/** Cr�ation/Attribution du service de r�ception
	 * @param string Identifiant du client auquel le service doit �tre attribu�
	 * @param string Num�ro de t�l�phone r�ception
	 * @param string Num�ro de codes � cr�er
	 *
	 * @returns string En cas de succ�s �OK <codes cr��s>�. <br>  En cas d��chec �KO
	 * <message d�erreur>
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


	/** Suspension du service de r�ception
	 *	@param string Identifiant du client dont le service doit �tre suspendu
	 *	@param string Num�ro de t�l�phone r�ception
	 *	@param string Code de partage � suspendre
	 *
	 *	@returns string En cas de succ�s �OK� . <br>  En cas d��chec �KO <message
	 * d�erreur>
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

	/** Activation/D�sactivation d�un client
	 *	@param string Identifiant du client � activer/d�sactiver
	 *	@param integer 0 = d�sactiver / 1 = activer
	 *
	 *	@returns string En cas de succ�s ��OK <statut client>� . <br> En cas d��chec �KO
	 *	<message d�erreur>
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