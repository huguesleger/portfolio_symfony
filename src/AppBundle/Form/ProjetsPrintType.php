<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
        $d = date('Y-m-d');
        $builder
                ->add('name')
                ->add('titre')
                ->add('description')
                ->add('colorTxt', ChoiceType::class, array(
                    'choices'  => array(
                        'white' => 'white',
                        'dark' => 'dark',
                    ),))
                ->add('annee', DateType::class, array(
                   'widget' => 'single_text',
                    'input' => 'datetime',
                   'attr' => ['max' => $d,'min' => '']))
                ->add('images', FileType::class, array('data_class' => null,'required' => false))
                ->add('image1', FileType::class, array('data_class' => null,'required' => false))
                ->add('technique')
                ->add('image2', FileType::class, array('data_class' => null,'required' => false))
                ->add('descriptionImg2')
                ->add('image3', FileType::class, array('data_class' => null,'required' => false))
                ->add('descriptionImg3')
                ->add('liens')
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
            'data_class' => 'AppBundle\Entity\ProjetsPrint'
        ));
    }



}
