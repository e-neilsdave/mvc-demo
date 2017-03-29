<?php 
 
namespace Sofid\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sofid\AdminBundle\Entity\Card;
 
class CardAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'id'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('nbScan')
		->add('type', 'choice', array(
				'choices' => array(
						Card::TYPE_CARD => 'Carte',
						Card::TYPE_MOBILE => 'Mobile',
				),
				'required' => true
		))
// 		->add('user', 'sonata_type_model_list')
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('nbScan')
		->add('type')
		->add('user')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('id')
		->add('nbScan')
		->add('type')
		->add('user')
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
		->add('nbScan')
		->add('type')
		->add('user')
		->end()
		;
	}
}