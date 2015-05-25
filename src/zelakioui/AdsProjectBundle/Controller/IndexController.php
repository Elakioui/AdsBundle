<?php

namespace zelakioui\AdsProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('zelakiouiAdsProjectBundle:default:index/layout/index.html.twig');
    }
}
