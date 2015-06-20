<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;

class AdvertController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $actualite = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        return $this->render('AugustinePlatformBundle:Advert:index.html.twig', array(
                    'actualite' => $actualite
        ));
    }

    public function historyAction() {
        $em = $this->getDoctrine()->getManager();
        $histo = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        return $this->render('AugustinePlatformBundle:Advert:history.html.twig', array(
                    'histo' => $histo
        ));
    }

    public function ajouterAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $a = new Actualite();

        $form = $this->createForm(new ActualiteType(), $a);

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            $a = $form->getData();
            $em->persist($a);
            $em->flush();

            return $this->redirect($this->generateUrl("augustine_platform_home"));
        }



        return $this->render('AugustinePlatformBundle:Advert:ajouter.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function etablissementsAction() {

        return $this->render('AugustinePlatformBundle:Advert:etablissements.html.twig', array (
            
        ));
    }

}