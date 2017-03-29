<?php

namespace Sofid\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sofid\AdminBundle\Entity\Palier;
use Sofid\AdminBundle\Form\PalierType;

/**
 * Palier controller.
 *
 */
class PalierController extends Controller
{
    /**
     * Lists all Palier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SofidAdminBundle:Palier')->findAll();

        return $this->render('SofidAdminBundle:Palier:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Palier entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Palier();
        $form = $this->createForm(new PalierType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('palier_show', array('id' => $entity->getId())));
        }

        return $this->render('SofidAdminBundle:Palier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Palier entity.
     *
     */
    public function newAction()
    {
        $entity = new Palier();
        $form   = $this->createForm(new PalierType(), $entity);

        return $this->render('SofidAdminBundle:Palier:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Palier entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Palier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SofidAdminBundle:Palier:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Palier entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Palier entity.');
        }

        $editForm = $this->createForm(new PalierType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SofidAdminBundle:Palier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Palier entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Palier entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PalierType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('palier_edit', array('id' => $id)));
        }

        return $this->render('SofidAdminBundle:Palier:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Palier entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SofidAdminBundle:Palier')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Palier entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('palier'));
    }

    /**
     * Creates a form to delete a Palier entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
