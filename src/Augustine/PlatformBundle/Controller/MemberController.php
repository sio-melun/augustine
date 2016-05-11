<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin")
 */
class MemberController extends Controller {

    /**
     * @Route("/ajouter", name="ajouter")
     * @Template()
     */
    public function ajouterAction() {
        $actualite = new Actualite();
        $actualiteType = new ActualiteType();

        $form = $this->createForm($actualiteType, $actualite);
        
        $request = $this->getRequest();
 
        $form->handleRequest($request);
        
        if ($form->isValid()) {

            $actualite->upload();
          
            $em = $this->getDoctrine()->getManager();

            $em->persist($actualite);
            $em->flush();
            // var_dump($actualite); exit();
            return $this->redirectToRoute("index");
        }

        return array(
            'form' => $form->createView(),
            'actualite' => $actualite
        );
    }

    /**
     * @Route("/editer/{id}", name="editer")
     * @Template()
     */
    public function editerAction(Actualite $actualite) {
            var_dump($actualite->getTitre());
            $em = $this->getDoctrine()->getEntityManager();

            $form = $this->createForm(new ActualiteType(), $actualite);

            $request = $this->getRequest();

            if ($request->isMethod('POST')) {
                $form->bind($request);
                if ($form->isValid()) {                  
                    $actualite->removeUpload(); // don't work
                    $actualite->upload();   
                    $em->persist($actualite);
                    $em->flush();
                    return $this->redirect(
                               $this->generateUrl("index", array(
                              'id' => $actualite->getId()
                    )));
               }
            }

            return array(
                'id' => $actualite->getId(),
                'titre' => $actualite->getTitre(),
                'form' => $form->createView(),
                'actualite' => $actualite
            );
        }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     * @Template()
     */
    public function supprimerAction(Actualite $actualite) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($actualite);
        $em->flush();

        return $this->redirectToRoute("index");
    }

}
