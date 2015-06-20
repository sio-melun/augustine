<?php

namespace Augustine\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Augustine\PlatformBundle\Entity\Actualite;
use Augustine\PlatformBundle\Form\ActualiteType;

/**
 * Actualite controller.
 *
 * @Route("/actualite")
 */
class ActualiteController extends Controller
{

    /**
     * Lists all Actualite entities.
     *
     * @Route("/", name="actualite")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AugustinePlatformBundle:Actualite')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Actualite entity.
     *
     * @Route("/", name="actualite_create")
     * @Method("POST")
     * @Template("AugustinePlatformBundle:Actualite:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Actualite();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actualite_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Actualite entity.
     *
     * @param Actualite $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Actualite $entity)
    {
        $form = $this->createForm(new ActualiteType(), $entity, array(
            'action' => $this->generateUrl('actualite_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Actualite entity.
     *
     * @Route("/new", name="actualite_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Actualite();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Actualite entity.
     *
     * @Route("/{id}", name="actualite_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AugustinePlatformBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Actualite entity.
     *
     * @Route("/{id}/edit", name="actualite_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AugustinePlatformBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Actualite entity.
    *
    * @param Actualite $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Actualite $entity)
    {
        $form = $this->createForm(new ActualiteType(), $entity, array(
            'action' => $this->generateUrl('actualite_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Actualite entity.
     *
     * @Route("/{id}", name="actualite_update")
     * @Method("PUT")
     * @Template("AugustinePlatformBundle:Actualite:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AugustinePlatformBundle:Actualite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('actualite_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Actualite entity.
     *
     * @Route("/{id}", name="actualite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AugustinePlatformBundle:Actualite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actualite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('actualite'));
    }

    /**
     * Creates a form to delete a Actualite entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actualite_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
