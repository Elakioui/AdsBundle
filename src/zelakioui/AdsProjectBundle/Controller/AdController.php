<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/05/15
 * Time: 16:22
 */

namespace zelakioui\AdsProjectBundle\Controller;
use AppBundle\Entity\Ad;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use zelakioui\AdsProjectBundle\Form\AdType;


class AdController extends Controller {

     public function addAdAction(){
         $form = null;
         $form = $this->createForm(new AdType(), new Ad());

         return $this->render('zelakiouiAdsProjectBundle:default:ad/layout/addAd.html.twig',
                               array('form'=> $form->createView()));
     }


}