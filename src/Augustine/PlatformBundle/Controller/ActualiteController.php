<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ActualiteController extends Controller {

 
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        // $actualites = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        $repo = $em->getRepository('AugustinePlatformBundle:Actualite');

        $qb = $repo->createQueryBuilder('a');
        $qb->orderBy('a.dateCrea', 'ASC')
                ->where('a.isHisto = 0')
                ->andwhere('a.id > 3');

        $query = $qb->getQuery();
        $query->setMaxResults(6);
        $actualites = $query->getArrayResult();

        return array(
                    'actualites' => $actualites
        );
    }

    /**
     * @Route("/history", name="history")
     * @Template()
     */
    public function historyAction() {
        $em = $this->getDoctrine()->getManager();
        // $actualites = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        $repo = $em->getRepository('AugustinePlatformBundle:Actualite');

        $qb = $repo->createQueryBuilder('a');
        $qb->orderBy('a.dateCrea', 'ASC')
                ->where('a.isHisto = 1')
                ->andwhere('a.id > 3');

        $query = $qb->getQuery();

        $actualites = $query->getArrayResult();

        return array(
                    'actualites' => $actualites,
        );
    }
   /**
     * @Route("/ajouter", name="ajouter")
     * @Template()
     */
    public function ajouterAction() {
        $em = $this->getDoctrine()->getManager();
        $a = new Actualite();

        $form = $this->createForm(new ActualiteType(), $a);

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $a = $form->getData();

                $logger = $this->get('logger');
                $logger->info($a->getTypeActu()->getLibelle());

                $em->persist($a);
                $em->flush();

                return $this->redirect($this->generateUrl("index"));
            }
        }



        return array(
                    'form' => $form->createView(),
        );
    }
   /**
     * @Route("/etatblissement", name="etablissement")
     * @Template()
     */
    public function etablissementsAction() {

        return array(
        );
    }

    /**
     * @Route("/voir/{id}", name="voir")
     * @Template()
     */
    public function voirAction(Actualite $actu) {
        return array(
                    'actualite' => $actu,
        );
    }

    /**
     * @Route("/editer/{id}", name="editer")
     * @Template()
     */
    public function editerAction(Actualite $actu) {
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(new ActualiteType(), $actu);

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $a = $form->getData();
                $em->persist($a);
                $em->flush();

                return $this->redirect(
                                $this->generateUrl("index", array(
                                    'id' => $a->getId()
                )));
            }
        }

        return $this->render('AugustinePlatformBundle:Actualite:editer.html.twig', array(
                    'id' => $actu->getId(),
                    'titre' => $actu->getTitre(),
                    'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     * @Template()
     */
    public function supprimerAction(Actualite $actu) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($actu);
        $em->flush();

        return $this->redirect($this->generateUrl("index"));
    }

}
