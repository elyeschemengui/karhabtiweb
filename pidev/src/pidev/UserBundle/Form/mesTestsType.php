<?php

namespace pidev\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class mesTestsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('niveau')
            ->add('question',TextareaType::class)
            ->add('choix1',TextareaType::class)
            ->add('choix2',TextareaType::class)
            ->add('choix3',TextareaType::class ,array('required' => false))
            ->add('choix4',TextareaType::class ,array('required' => false))
            ->add('choix5',TextareaType::class ,array('required' => false))
            ->add('reponse')
            ->add('image',FileType::class)
            ->add('ajouter',SubmitType::class);        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pidev\UserBundle\Entity\mesTests'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pidev_userbundle_mestests';
    }


}
