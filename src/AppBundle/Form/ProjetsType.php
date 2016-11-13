<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $d = date('Y-m-d');
        $builder
            ->add('titre')
            ->add('images', FileType::class, array('data_class' => null))
            ->add('descriptif')
             ->add('imgPresentation', FileType::class, array('data_class' => null))
                ->add('descriptionSociete')
                ->add('annee', DateType::class, array(
                   'widget' => 'single_text',
                    'input' => 'datetime',
                   'attr' => ['max' => $d,'min' => '']))
                ->add('realisations')
                ->add('imgLogo', FileType::class, array('data_class' => null))
                ->add('imgTemplate', FileType::class, array('data_class' => null))
                ->add('descriptionTemplate')
                ->add('lienSite') 
            ->add('publier')
            ->add('sauvegarder', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Projets'
        ));
    }
}
