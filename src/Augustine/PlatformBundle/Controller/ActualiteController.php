<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;



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