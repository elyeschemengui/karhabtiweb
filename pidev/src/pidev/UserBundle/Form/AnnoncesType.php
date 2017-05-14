<?php

namespace pidev\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnoncesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('TITRE')->add('NOMBRE_DE_CYLINDRES')->add('ENERGIE',ChoiceType::class, array(
            'choices' => array('Essence'=>'Essence','Diesel'=>'Diesel','Electrique'=>'Electrique','Gaz'=>'Gaz')))->add('PUISSANCE_FISCALE')->add('CYLINDREE')->add('BOITE',ChoiceType::class, array(
            'choices' => array('Manuel'=>'Manuel','Automatique'=>'Automatique')))->add('DESCRIPITION')
            ->add('PRIX')
            ->add('region',ChoiceType::class, array(
                'choices' => array(
                    'Ariana'=>'Ariana',
'Béja'=> 'Béja',
'BenArous'=>'BenArous',
'Bizerte'=>'Bizerte',
'Gabès'=>'Gabès',
'Gafsa'=>'Gafsa',
'Jendouba'=>'Jendouba',
'Kairouan'=>'Kairouan',
'Kasserine'=>'Kasserine',
'Kébili'=>'Kébili',
'Kef'=>'Kef',
'Mahdia'=>'Mahdia',
'Manouba'=>'Manouba',
'Médenine'=>'Médenine',
'Monastir'=>'Monastir',
'Nabeul'=>'Nabeul',
'Sfax'=>'Sfax',
'SidiBouzid'=>'SidiBouzid',
'Siliana'=>'Siliana',
'Sousse'=>'Sousse',
'Tataouine'=>'Tataouine',
'Tozeur'=>'Tozeur',
'Tunis'=>'Tunis',
'Zaghouan'=>'Zaghouan',

                )))
            ->add('image', FileType::class, array('data_class' => null,'required'=>false))
            ->add('image1', FileType::class, array('data_class' => null,'required'=>false))
            ->add('image2', FileType::class, array('data_class' => null,'required'=>false))
            ->add('image3', FileType::class, array('data_class' => null,'required'=>false))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'pidev\UserBundle\Entity\Annonces'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'pidev_userbundle_annonces';
    }


}
