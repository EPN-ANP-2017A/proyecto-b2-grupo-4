<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Goles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Gole controller.
 *
 * @Route("goles")
 */
class GolesController extends Controller
{
    /**
     * Lists all gole entities.
     *
     * @Route("/", name="goles_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $goles = $em->getRepository('AppBundle:Goles')->findAll();

        return $this->render('goles/index.html.twig', array(
            'goles' => $goles,
        ));
    }

    /**
     * Creates a new gole entity.
     *
     * @Route("/new", name="goles_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gole = new Gole();
        $form = $this->createForm('AppBundle\Form\GolesType', $gole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gole);
            $em->flush();

            return $this->redirectToRoute('goles_show', array('id' => $gole->getId()));
        }

        return $this->render('goles/new.html.twig', array(
            'gole' => $gole,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gole entity.
     *
     * @Route("/{id}", name="goles_show")
     * @Method("GET")
     */
    public function showAction(Goles $gole)
    {
        $deleteForm = $this->createDeleteForm($gole);

        return $this->render('goles/show.html.twig', array(
            'gole' => $gole,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gole entity.
     *
     * @Route("/{id}/edit", name="goles_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Goles $gole)
    {
        $deleteForm = $this->createDeleteForm($gole);
        $editForm = $this->createForm('AppBundle\Form\GolesType', $gole);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('goles_edit', array('id' => $gole->getId()));
        }

        return $this->render('goles/edit.html.twig', array(
            'gole' => $gole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gole entity.
     *
     * @Route("/{id}", name="goles_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Goles $gole)
    {
        $form = $this->createDeleteForm($gole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gole);
            $em->flush();
        }

        return $this->redirectToRoute('goles_index');
    }

    /**
     * Creates a form to delete a gole entity.
     *
     * @param Goles $gole The gole entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Goles $gole)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('goles_delete', array('id' => $gole->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
