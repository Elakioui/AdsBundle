<?php

namespace zelakioui\AdsProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body')
            ->add('dateModif')
            ->add('datePub')
            ->add('prix')
            ->add('title')
            ->add('type')
            ->add('category', 'entity',array('class'=> 'AppBundle\Entity\Category',
                                              'property' => 'name'
                                             )
            )
            ->add('city','entity',array('class'=> 'AppBundle\Entity\City',
                                              'property' => 'name'
                                             ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_ad';
    }
}
