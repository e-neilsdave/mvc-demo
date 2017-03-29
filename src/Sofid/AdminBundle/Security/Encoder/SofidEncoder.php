<?php

namespace Sofid\AdminBundle\Security\Encoder;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class SofidEncoder implements PasswordEncoderInterface {

	public function encodePassword($pass, $salt)
	{
		$pass = hash('sha512',($pass));
		$iterations = 5000; // Par défaut
		$salted = $pass.$salt;
		
		$digest = hash('sha1', $salted, true);
		
		for ($i = 1; $i < $iterations; $i++) {
			$digest = hash('sha1', $digest.$salted, true);
			 
		}
		$cryptedPass = base64_encode($digest);
		
		return $cryptedPass;
	}

	public function isPasswordValid($encoded, $raw, $salt)
	{
		return $encoded === $this->encodePassword($raw, $salt);
	}
	
	public function encodePasswordAPI($pass, $salt)
	{
		$iterations = 5000; // Par défaut
		$salted = $pass.$salt;
		
		$digest = hash('sha1', $salted, true);
		
		for ($i = 1; $i < $iterations; $i++) {
			$digest = hash('sha1', $digest.$salted, true);
			 
		}
		$cryptedPass = base64_encode($digest);
		
		return $cryptedPass;
	}
	
	public function isPasswordValidAPI($encoded, $raw, $salt)
	{
		return $encoded === $this->encodePasswordAPI($raw, $salt);
	}

}