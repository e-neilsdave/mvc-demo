<?php

namespace Sofid\FideleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FideleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('username')
            ->add('password', 'repeated', array(
			'first_name' => 'pass',
			'second_name' => 'confirm',
            'invalid_message' => 'The passwords you provided did not match.',
			'type' => 'password'
			))
            ->add('email')
            ->add('telephone', 'number')
            ->add('dateNaissance', 'date', array(
    'years' => range(date('Y') - 100, date('Y') - 5)
   ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofid\AdminBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'sofid_fidelebundle_fideletype';
    }
}
