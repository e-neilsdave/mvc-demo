<?php 
 
namespace Sofid\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
class UserAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'id'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('username')
		->add('password')
		->add('email')
		->add('dateNaissance', 'birthday', array('required' => false))
		->add('telephone')
		->add('pointsSofid')
		->add('cards', 'sonata_type_collection', array(), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position'
            ))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('username')
		->add('email')
		->add('dateNaissance')
		->add('telephone')
		->add('pointsSofid')
		->add('gains');
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->add('id')
		->addIdentifier('username')
		->add('email')
		->add('dateNaissance')
		->add('telephone')
		->add('pointsSofid')
		->add('_action', 'actions', array(
				'actions' => array(
// 						'view' => array(),
						'edit' => array(),
						'delete' => array(),
				)
		))
		;
	}
	
	/**
	 * {@inheritdoc}
	 */
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
		->with('Details')
		->add('username')
		->add('email')
		->add('dateNaissance')
		->add('telephone')
		->add('pointsSofid')
		->end()
		;
	}
	
	public function prePersist($user)
	{
		parent::prePersist($user);
		foreach ($user->getCards() as $card) {
			$card->setUser($user);
		}
		$user->setPassword(hash('sha512', $user->getPassword()));
	}
	
	public function preUpdate($user)
	{
		parent::preUpdate($user);
		 
			foreach ($user->getCards() as $card) {
			$card->setUser($user);
		}
		$user->setCards($user->getCards());
		$user->setPassword(hash('sha512', $user->getPassword()));
	}
	
}