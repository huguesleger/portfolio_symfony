<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
      /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $d = date('Y-m-d');
        $builder
                ->add('annee', DateType::class, array(
                   'widget' => 'single_text',
                    'input' => 'datetime',
                   'format' => 'dd/MM/yyyy',
                   'attr' => ['max' => $d,'min' => '']))
                ->add('titre')
                ->add('texte')
                ->add('sauvegarder', SubmitType::class);
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Formation'
        ));
    }


}
