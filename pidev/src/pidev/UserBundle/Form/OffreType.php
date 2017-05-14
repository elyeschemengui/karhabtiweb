<?php

namespace pidev\UserBundle\Form;

use pidev\UserBundle\pidevUserBundle;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomOffre')
            ->add('ptventeId',EntityType::class,array('label' => 'Nom point de vente','class'=>'pidev\UserBundle\Entity\Pointdevente','multiple'=>false,'choice_label'=>'nom'))
            ->add('prixinit', null,array('label'=>'Prix initial'))
            ->add('tauxRemise', null,array('label'=>'Taux remise'))
            ->add('description',TextareaType::class)
            ->add('photo',FileType::class, array('data_class' => null ))      ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pidev\UserBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pidev_userbundle_offre';
    }


}
