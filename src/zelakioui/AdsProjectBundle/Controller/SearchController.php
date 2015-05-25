<?php

namespace zelakioui\AdsProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function advancedSearchAction(Request $rq)
    {
        $which_object   = $rq->request->get('which_object');
        $which_category = $rq->request->get('which_category');
        $which_city     = $rq->request->get('which_city');
        //echo strval($which_object).' '.$which_category .' '.strval($which_city);
        //die();
        $entities = $this->get('advancedSearch')->search($which_object, $which_category, $which_city ) ;
        return $this->render('zelakiouiAdsProjectBundle:default:search/layout/advancedSearch.html.twig',
                                array('ads'=>$entities));
    }
    public function formContentAction(){

       $em         = $this->getDoctrine()->getManager();
       $categories = $em->getRepository('AppBundle:Category')->findAll();
       $cities     = $em->getRepository('AppBundle:City')->findAll();
        return $this->render('zelakiouiAdsProjectBundle:default:search/moduleUsed/searchForm.html.twig',
                                    array('categories'=> $categories,
                                          'cities'    => $cities
                                    ));
    }


}
