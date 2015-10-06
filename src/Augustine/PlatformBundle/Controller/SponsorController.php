<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SponsorController extends Controller
{
    /**
     * @Route("/sponsors", name="sponsors")
     * @Template()
     * 
     */
    public function indexAction()
    {
        return array(
            
        );
    }
}