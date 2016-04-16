<?php

namespace Aved\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array(
                    'label' => 'Titre'))
                ->add('description', 'textarea', array(
                    'label' => 'Contenu'))
                ->add('start', 'datetime', array(
                    'label' => 'Date de début'))
                ->add('end', 'datetime', array(
                    'label' => 'Date de fin'))
                ->add('place', 'text', array(
                    'label' => 'Lieu'))
                ->add('banner', 'file', array(
                    'label' => 'Image de bannière'))
                ->add('thumbnail', 'file', array(
                    'label' => 'Image de miniature'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aved\BlogBundle\Entity\Event',
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'event';
    }
}