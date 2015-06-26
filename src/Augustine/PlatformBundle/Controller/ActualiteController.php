<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;

class ActualiteController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        // $actualites = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        $repo = $em->getRepository('AugustinePlatformBundle:Actualite');

        $qb = $repo->createQueryBuilder('a');
        $qb->orderBy('a.dateCrea', 'ASC')
                ->where('a.isHisto = 0')
                ->where('a.id > 3');

        $query = $qb->getQuery();
        $query->setMaxResults(6);
        $actualites = $query->getArrayResult();

        return $this->render('AugustinePlatformBundle:Actualite:index.html.twig', array(
                    'actualites' => $actualites
        ));
    }

    public function historyAction() {
        $em = $this->getDoctrine()->getManager();
        // $actualites = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        $repo = $em->getRepository('AugustinePlatformBundle:Actualite');

        $qb = $repo->createQueryBuilder('a');
        $qb->orderBy('a.dateCrea', 'ASC')
                ->where('a.isHisto = 1');

        $query = $qb->getQuery();

        $actualites = $query->getArrayResult();

        return $this->render('AugustinePlatformBundle:Actualite:history.html.twig', array(
                    'actualites' => $actualites,
        ));
    }

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

                return $this->redirect($this->generateUrl("augustine_platform_home"));
            }
        }



        return $this->render('AugustinePlatformBundle:Actualite:ajouter.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function etablissementsAction() {

        return $this->render('AugustinePlatformBundle:Actualite:etablissements.html.twig', array(
        ));
    }

    public function voirAction(Actualite $actu) {
        return $this->render('AugustinePlatformBundle:Actualite:voir.html.twig', array(
                    'actualite' => $actu,
        ));
    }

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
                                $this->generateUrl("augustine_platform_voir", array(
                                    'id' => $a->getId()
                )));
            }
        }

        return $this->render('AugustinePlatformBundle:Actualite:editer.html.twig', array(
                    'id' => $actu->getId(),
                    'form' => $form->createView(),
        ));
    }

    public function supprimerAction(Actualite $actu) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($actu);
        $em->flush();

        return $this->redirect($this->generateUrl("augustine_platform_home"));
    }

}
