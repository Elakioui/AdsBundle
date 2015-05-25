<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23/05/15
 * Time: 22:42
 */
namespace zelakioui\AdsProjectBundle\Form;
use AppBundle\Entity\UserAd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;;

class RegistrationFormType  extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder->add('status','choice',
                      array('choices'=>array('particulier'   =>'Particulier',
                                             'professionnel' =>'Professionnel'),
                            'multiple' => false,
                            'expanded' => true,
                            'label'     => 'Etes-vous un '
                      )
        );

       $builder->add('phone');
        $builder->add('phoneDisplayed','checkbox', array(
            'label'    => 'Afficher votre numéro ?',
            'required' => false,
        ));

        $builder->add('city','entity',array('class'=> 'AppBundle\Entity\City',
                                            'property'=> 'name',
        ));
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }
    /**public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UserAd',
        ));
    }*/

    public function getName()
    {
        return 'Ads_project_user_registration';
    }
}