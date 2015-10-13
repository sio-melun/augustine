<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


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
        // $actualitealites = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

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
  
        $actualite = new Actualite();
        $actualiteType = new ActualiteType();

        $form = $this->createForm($actualiteType, $actualite);

        $request = $this->getRequest();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $actualite->upload();

                $em->persist($actualite);
                $em->flush();
                
                return $this->render('AugustinePlatformBundle:Actualite:index.html.twig');

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
    public function voirAction(Actualite $actualite) {
        return array(
            'actualite' => $actualite,
        );
    }

    /**
     * @Route("/editer/{id}", name="editer")
     * @Template()
     */
    public function editerAction(Actualite $actualite) {
        $em = $this->getDoctrine()->getEntityManager();

        $form = $this->createForm(new ActualiteType(), $actualite);

        $request = $this->getRequest();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
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
