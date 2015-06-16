<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SponsorController extends Controller
{
    public function indexAction()
    {
        return $this->render('AugustinePlatformBundle:Sponsor:index.html.twig');
    }
}