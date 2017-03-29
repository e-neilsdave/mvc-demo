<?php 
 
namespace Sofid\AdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
 
class OffreAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'id'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('title')
		->add('commentaires')
		->add('nbPointOffre')
		->add('recompense')
		->add('dateLancement')
		->add('dateFin')
		->add('commercant', 'sonata_type_model_list')
        ->add('path', 'file', array(
                'data_class' => null,
                'property_path' => 'path', 'required' => false))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('title')
		->add('commentaires')
		->add('nbPointOffre')
		->add('recompense')
		->add('dateLancement')
		->add('dateFin')
		->add('commercant')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('title')
		->add('commentaires')
		->add('nbPointOffre')
		->add('recompense')
		->add('dateLancement')
		->add('dateFin')
		->add('commercant')
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
		->add('title')
		->add('commentaires')
		->add('nbPointOffre')
		->add('recompense')
		->add('dateLancement')
		->add('dateFin')
		->add('commercant')
		->end()
		;
	}

    public function prePersist($image) {
        $this->saveFile($image);
    }

    public function preUpdate($image) {
        $this->saveFile($image);
    }

    public function saveFile($image) {
        $basepath = $this->getRequest()->getBasePath();
        $image->upload($basepath);
    }
}