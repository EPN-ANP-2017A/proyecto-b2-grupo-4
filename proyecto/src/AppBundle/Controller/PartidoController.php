<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Partido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Partido controller.
 *
 * @Route("admin/partido")
 */
class PartidoController extends Controller
{
    /**
     * Lists all partido entities.
     *
     * @Route("/", name="partido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partidos = $em->getRepository('AppBundle:Partido')->findAll();

        return $this->render('partido/index.html.twig', array(
            'partidos' => $partidos,
        ));
    }

    /**
     * Creates a new partido entity.
     *
     * @Route("/new", name="partido_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $partido = new Partido();
        $form = $this->createForm('AppBundle\Form\PartidoType', $partido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($partido);
            $em->flush();

            return $this->redirectToRoute('partido_show', array('id' => $partido->getId()));
        }

        return $this->render('partido/new.html.twig', array(
            'partido' => $partido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a partido entity.
     *
     * @Route("/{id}", name="partido_show")
     * @Method("GET")
     */
    public function showAction(Partido $partido)
    {
        $deleteForm = $this->createDeleteForm($partido);

        return $this->render('partido/show.html.twig', array(
            'partido' => $partido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing partido entity.
     *
     * @Route("/{id}/edit", name="partido_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Partido $partido)
    {
        $deleteForm = $this->createDeleteForm($partido);
        $editForm = $this->createForm('AppBundle\Form\PartidoType', $partido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partido_edit', array('id' => $partido->getId()));
        }

        return $this->render('partido/edit.html.twig', array(
            'partido' => $partido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a partido entity.
     *
     * @Route("/{id}", name="partido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Partido $partido)
    {
        $form = $this->createDeleteForm($partido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partido);
            $em->flush();
        }

        return $this->redirectToRoute('partido_index');
    }

    /**
     * Creates a form to delete a partido entity.
     *
     * @param Partido $partido The partido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Partido $partido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('partido_delete', array('id' => $partido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
