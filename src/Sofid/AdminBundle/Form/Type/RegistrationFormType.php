<?php

namespace Sofid\AdminBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('entreprise');
        $builder->add('raisonSociale');
        $builder->add('adresse');
        $builder->add('codePostal');
        $builder->add('ville');
        $builder->add('pays');
    }

    public function getName()
    {
        return 'sofid_user_registration';
    }
}