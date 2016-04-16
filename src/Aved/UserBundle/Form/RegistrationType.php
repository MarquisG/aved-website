<?php

namespace Aved\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('school', 'entity', array(
                    'class'    => 'AvedUserBundle:School',
                    'query_builder' => function(EntityRepository $repository) { 
                        return $repository->createQueryBuilder('u')->orderBy('u.name', 'ASC');
                    },
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false,
                    'label' => 'Ecole/Université'
                ));
    }

    public function getParent()
    {
        //return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}