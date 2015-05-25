<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/05/15
 * Time: 12:33
 */

namespace zelakioui\AdsProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class PageController  extends Controller{

    public function menuAction(){

        $manager = $this->getDoctrine()->getManager();
        $pages   = $manager->getRepository('AppBundle:Page')->findAll();

        return $this->render('zelakiouiAdsProjectBundle:default:page/moduleUsed/menu.html.twig',
                              array('pages'=>$pages));
    }
    public function getPageAction($id){

        $manager = $this->getDoctrine()->getManager();
        $page  = $manager->getRepository('AppBundle:Page')->find($id);

        return $this->render('zelakiouiAdsProjectBundle:default:page/layout/page.html.twig',
            array('page'=>$page));
    }

}