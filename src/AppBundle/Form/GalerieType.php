<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalerieType extends AbstractType
{
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('titre')
                ->add('description')
                ->add('technique')
                ->add('imageMin', FileType::class, array('data_class' => null,'required' => false))
                ->add('imageDetail', FileType::class, array('data_class' => null,'required' => false))
                ->add('imageDetail1', FileType::class, array('data_class' => null,'required' => false))
                ->add('imageDetail2', FileType::class, array('data_class' => null,'required' => false))
                ->add('texte')
                ->add('publier')
                ->add('sauvegarder', SubmitType::class)
                ;
    }
    
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Galerie'
        ));
    }


}
