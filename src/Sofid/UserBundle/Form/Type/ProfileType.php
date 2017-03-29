<?php

namespace Sofid\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface; 
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileType extends BaseType
{
	public function buildForm(FormBuilderInterface $builder, array $options)     
	{         
    	parent::buildForm($builder, $options); 
		
		$builder
	    	->add('username')
	    	->add('email')
	    	->add('firstname', null, array('required' => true))
	    	->add('lastname', null, array('required' => true))
	    	->add('image', 'file', array('data_class' => null, 'required' => false))
	    	->add('dateOfBirth', 'birthday', array('required' => false))
	    	->add('website', 'url', array('required' => false))
	    	->add('gender', 'choice', array(
	    			'choices' => array(
	    					'u' => 'Inconnu',
	    					'm'  => 'Masculin',
	    					'f'    => 'Feminin',
	    			),
	    			'required' => true
	    	))
	    	->add('phone', null, array('required' => false))
	    	->add('entreprise', null, array('required' => true))
	    	->add('raisonSociale', null, array('required' => true))
	    	->add('adresse', null, array('required' => true))
	    	->add('codePostal', null, array('required' => true))
	    	->add('ville', null, array('required' => true))
	    	->add('pays')
		;
	}

	public function getName()
	{
		return 'sofid_edit_commercant';
	}
}
