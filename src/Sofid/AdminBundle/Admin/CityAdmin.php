<?php
/**
 * Created by PhpStorm.
 * User: bahar
 * Date: 6/14/14
 * Time: 4:43 PM
 */

namespace Sofid\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CityAdmin extends Admin{
// setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'id'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('logo', 'file', array(
                'data_class' => null,
                'property_path' => 'logo', 'required' => false))
            ->add('url1')
            ->add('url2')
            ->add('url3')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('logo')
            ->add('url1')
            ->add('url2')
            ->add('url3')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('logo')
            ->add('url1')
            ->add('url2')
            ->add('url3')
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
            ->add('logo')
            ->add('url1')
            ->add('url2')
            ->add('url3')
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