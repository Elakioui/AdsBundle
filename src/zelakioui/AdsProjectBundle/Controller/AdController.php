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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use zelakioui\AdsProjectBundle\Form\AdType;


class AdController extends Controller {

     public function addAdAction(Request $rq){
         $newAd= new Ad();
         $form = $this->createForm(new AdType(), $newAd);
         $request = $this->get('request');
         if($request->getMethod() == 'POST' ){
            // if($form->isValid()){
                 $em = $this->getDoctrine()->getManager();
                 $form->handleRequest($rq);
                 //add creation date
                 $newAd->setDatePub(new \DateTime());
                 $em->persist($newAd);
                 $em->flush();
                 return new Response('validé');
             //}

         }



         return $this->render('zelakiouiAdsProjectBundle:default:ad/layout/addAd.html.twig',
                               array('form'=> $form->createView()));
     }

    public function successAddAdAction(){
        return $this->render('zelakiouiAdsProjectBundle:default:ad/layout/successAddAd.html.twig');
    }


}