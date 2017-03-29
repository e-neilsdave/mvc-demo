<?php
namespace Sofid\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CommercantAdmin extends Admin
{
	protected $userManager;
	/**
	 * {@inheritdoc}
	 */
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('username')
		->add('picture', NULL, array('template' => 'SofidAdminBundle:Form:list_commercant_image.html.twig'))
    	->add('firstname')
    	->add('lastname')
    	->add('entreprise')
    	->add('ville')
		->add('enabled', null, array('editable' => true))
		->add('sms')
		->add('createdAt')
		->add('_action', 'actions', array(
				'actions' => array(
// 						'view' => array(),
						'edit' => array(),
						'delete' => array(),
				)
		))
        ->add('qrcode', NULL, array('template' => 'SofidAdminBundle:Form:list_commercant_qrcode.html.twig'))
        ->add('duplicate_merchant', NULL, array('template' => 'SofidAdminBundle:Form:duplicate_merchant.html.twig'))
		;
	}

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
          $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text', array('required' => false))
                ->add('code', 'text', array('required' => false, 'disabled' => true))

            ->end()
            ->with('Profile')
                ->add('firstname', null, array('required' => true))
                ->add('lastname', null, array('required' => true))
                ->add('image', 'file', array('data_class' => null, 'required' => false))
                ->add('dateOfBirth', 'birthday', array('required' => false))
                ->add('website', 'url', array('required' => false))
                ->add('client', 'text', array('required' => false))
                ->add('gender', 'choice', array(
                    'choices' => array(
                        'u' => 'Inconnu',
                        'm'  => 'Masculin',
                        'f'     => 'Feminin',
                    ),
                    'required' => true,
                    'translation_domain' => $this->getTranslationDomain()
                ))
                ->add('phone', null, array('required' => false))
            ->end()
            ->with('Commercant')
	            ->add('entreprise', null, array('required' => true))
	            ->add('nbPointScan', null, array('required' => true))

                    ->add('editable', 'choice', array(
                                        'choices'=>array('0'=>'Fix Points', '1'=>'Manual Points'),
                                        'label'     => 'Type for Scan Points',
                                        'expanded'=>true,
                                        'multiple'=>false,
                                        'required'  => false))
                   ->add('display_editable', 'checkbox', array(
                            'label'     => 'Display scan type points option?',
                            'required'  => false))
                   ->add('exportOption', 'checkbox', array(
                            'label'     => 'Display export option?',
                            'required'  => false))
                    ->add('MessageManualPointsScreen', 'textarea', array('required' => true))
                    ->add('conversionValue')
	            ->add('raisonSociale', null, array('required' => true))
	            ->add('adresse', null, array('required' => true))
	            ->add('codePostal', null, array('required' => true))
	            ->add('ville', null, array('required' => true))
	            ->add('pays')
	            ->end()
	        ->with('Paliers')
	        ->add('paliers', 'sonata_type_collection', array('by_reference' => true,'required' => false), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position'
            ))
	        ->end()
	        ->with('Gains')
	        ->add('gains', 'sonata_type_collection', array('by_reference' => true,'required' => false), array(
	        		'edit' => 'inline',
	        		'inline' => 'table',
	        		'sortable'  => 'position'
	        ))
	        ->end()
	        ->with('Category')
	        ->add('category', 'sonata_type_model_list' , array('by_reference' => true,'required' => true))
	        ->end()
	        ->with('SMS')
	        ->add('sms', null, array('required' => false))
	        ->end()
// 	        ->with('Offres')
// 	        ->add('offres', 'sonata_type_collection', array(), array(
//                 'edit' => 'inline',
//                 'inline' => 'table',
//                 'sortable'  => 'position'
//             ))
// 	        ->end()
        ;

//         if (!$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
//             $formMapper
//                 ->with('Gestion')
//                     ->add('roles', null, array(
//                         'expanded' => true,
//                         'multiple' => true,
//                         'required' => false
//                     ))
// //                     ->add('locked', null, array('required' => false))
// //                     ->add('expired', null, array('required' => false))
//                     ->add('enabled', null, array('required' => false))
// //                     ->add('credentialsExpired', null, array('required' => false))
//                 ->end()
//             ;
//         }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
    	$filterMapper
    	->add('id')
    	->add('username')
    	->add('firstname')
    	->add('lastname')
    	->add('entreprise')
    	->add('codePostal')
    	->add('ville')
    	->add('pays')
    	;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
    	$showMapper
    	->with('General')
    	->add('username')
    	->add('picture')
    	->add('email')
    	->end()
    	->with('Profile')
    	->add('firstname')
    	->add('lastname')
    	->add('dateOfBirth', 'birthday')
    	->add('website')
    	->add('client')
    	->add('gender')
    	->add('phone')
    	->end()
    	->with('Commercant')
    	->add('entreprise')
    	->add('codePostal')
    	->add('ville')
    	->add('pays')
    	->end()
    	->with("Users")
    	->add('gains')
    	->end()
    	;
    }

    public function getUserManager()
    {
    	if (!$this->userManager) {
    		$this->userManager = $this->configurationPool->getContainer()->get('fos_user.user_manager');
    	}
    	return $this->userManager;
    }

    public function prePersist($commercant)
    {
    	parent::prePersist($commercant);
    	if ($commercant->getPaliers()) {
	    	foreach ($commercant->getPaliers() as $palier) {
	    		$palier->setCommercant($commercant);
	    	}
    	}
    	if ($commercant->getGains()) {
    		foreach ($commercant->getGains() as $gain) {
    			$gain->setCommercant($commercant);
    		}
    	}
    }

    public function preUpdate($commercant)
    {
  	parent::preUpdate($commercant);

        if ($commercant->getPaliers()) {
	    	foreach ($commercant->getPaliers() as $palier) {
	    		$palier->setCommercant($commercant);
	    	}
    	}
    	$commercant->setPaliers($commercant->getPaliers());

        $doctrine = $this->getConfigurationPool()->getContainer()->get('Doctrine');
        $cacheGain= $doctrine->getRepository('SofidAdminBundle:GainCache')->findBy(array('commercantId'=>$commercant->getId()));
        if ($commercant->getGains()) {
            foreach ($commercant->getGains() as $gain) {
                $user = $gain->getUser();
                foreach ($cacheGain as $cache) {
                    if (isset($user) && ($user->getId() == $cache->getUserId()) && ($commercant->getId() == $cache->getCommercantId()) && (!$cache->getIsUpdated()) ) {
                        $gain->setNbPoints($cache->getNbPoints());
                        $cache->setIsUpdated(true);
                    }
                }
                $gain->setCommercant($commercant);
            };
        }
        $commercant->setGains($commercant->getGains());
    }



}