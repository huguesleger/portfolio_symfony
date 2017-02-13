<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AproposType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('texte') 
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
            'data_class' => 'AppBundle\Entity\Apropos'
        ));
    }

     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function getBlockPrefix()
    {
        return 'appbundle_apropos';
    }


}
