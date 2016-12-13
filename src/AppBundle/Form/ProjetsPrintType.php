<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetsPrintType extends AbstractType
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
                ->add('images', FileType::class, array('data_class' => null))
                ->add('image1', FileType::class, array('data_class' => null))
                ->add('technique')
                ->add('image2', FileType::class, array('data_class' => null))
                ->add('descriptionImg2')
                ->add('image3', FileType::class, array('data_class' => null))
                -add('descriptionImg3')
                ->add('liens')
                ->add('publier')
                
                ->add('save', SubmitType::class)
                ;
    }
    
   /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProjetsPrint'
        ));
    }



}
