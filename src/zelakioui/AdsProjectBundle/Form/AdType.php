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
            ->add('type','choice',array('choices'=> array('offre'=> 'Offre','demande'=> 'Demande'),
                                         'multiple' => false,
                                         'expanded'=> true,
                                          'label' => 'vous voulez faire une :'
            ))
            ->add('category', 'entity',array('class'=> 'AppBundle\Entity\Category',
                                              'property' => 'name'
                                             )
            )
            ->add('city','entity',array('class'=> 'AppBundle\Entity\City',
                                              'property' => 'name'
                                             ))
            ->add('prix')
            ->add('title')
            ->add('body')
            ->add('password','password',array('label'=> 'Saisir le mot de passe'))
            ->add('rewritePassword','password',array('label'=>'retaper le mot de passe :'))
            ->add('ajouter','submit')
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
