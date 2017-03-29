<?php

namespace Sofid\CommercantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PalierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nbPointPalier')
            ->add('recompense')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofid\AdminBundle\Entity\Palier'
        ));
    }

    public function getName()
    {
        return 'sofid_adminbundle_paliertype';
    }
}
