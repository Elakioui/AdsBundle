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

/**
 * Class AdController
 * @package zelakioui\AdsProjectBundle\Controller
 */
class AdController extends Controller
{
    /** Adding an ad action
     * @param Request $rq
     * @return Response
     */
    public function addAdAction(Request $rq)
    {
        $newAd = new Ad();
        $form = $this->createForm(new AdType(), $newAd);//create form
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {//test if the form is submited
            $em = $this->getDoctrine()->getManager();//instantiate entity manager
            $form->handleRequest($rq);
            $newAd->setDatePub(new \DateTime());//set the current date
            //if it is authentified
            if ($this->get('security.authorization_checker')->isGranted('ROLE_CUSTOMER')) {//test if the currrent user has ROLE_CUSTOMER ROLE
                $user = $this->getUser();
                $newAd->setUserAd($user);//set ad owner
            } //the user isn't get aut
            $em->persist($newAd);
            $em->flush();
            //return a success page
            return $this->render('zelakiouiAdsProjectBundle:default:ad/layout/successAddAd.html.twig');
        }

        //return form page for adding a new ad
        return $this->render('zelakiouiAdsProjectBundle:default:ad/layout/addAd.html.twig',
            array('form' => $form->createView()));
    }
}