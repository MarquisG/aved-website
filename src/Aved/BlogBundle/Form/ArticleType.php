<?php

namespace Aved\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array(
                    'label' => 'Titre'))
                ->add('description', 'textarea', array(
                    'label' => 'Contenu'))
                ->add('banner', 'file', array(
                    'label' => 'Image de bannière'))
                ->add('thumbnail', 'file', array(
                    'label' => 'Image de miniature'))
                ->add('event', 'entity', array(
                    'class'    => 'AvedBlogBundle:Event',
                    'query_builder' => function(EntityRepository $repository) { 
                        return $repository->createQueryBuilder('u')->orderBy('u.title', 'ASC');
                    },
                    'required' => false,
                    'multiple' => false,
                    'expanded' => false,
                    'choice_label' => 'title',
                    'label' => 'Evénement (facultatif)'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aved\BlogBundle\Entity\Article',
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'article';
    }
}