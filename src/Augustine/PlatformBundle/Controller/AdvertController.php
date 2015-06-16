<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller
{
    public function indexAction()
    {
        return $this->render('AugustinePlatformBundle:Advert:index.html.twig');
    }
        public function historyAction()
    {
        return $this->render('AugustinePlatformBundle:Advert:history.html.twig');
    }
}
