<?php 
 
namespace Sofid\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sofid\AdminBundle\Entity\Card;
 
class CategoriesAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'id'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('category_name')
		->add('main_category')
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('category_name')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('id')
		->add('category_name')
		->add('main_category')
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
		->add('category_name')
		->add('main_category')
		->end()
		;
	}
}