<?php

namespace Augustine\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Augustine\PlatformBundle\Form\TypeActuType;

class ActualiteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titre')
                ->add('texte', 'textarea')
                ->add('dateActu')
                ->add('isHisto', 'checkbox', array('required' => false))
                ->add('nomRessource')
                ->add('typeActu', 'entity', array(
                    'class' => 'AugustinePlatformBundle:TypeActu',
                    'property' => 'libelle',
                    'multiple' => false
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Augustine\PlatformBundle\Entity\Actualite'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'augustine_platformbundle_actualite';
    }

}
