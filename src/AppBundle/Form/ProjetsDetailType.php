<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetsDetailType extends AbstractType
{
       /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('imgPresentation')
                ->add('descriptionSociete')
                ->add('societe')
                ->add('annee')
                ->add('realisations')
                ->add('imgLogo')
                ->add('imgTemplate')
                ->add('descriptionTemplate')
                ->add('lienSite') 
                ->add('save', SubmitType::class)
                ;
    }
    
        /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProjetsDetail'
        ));
    }


}
