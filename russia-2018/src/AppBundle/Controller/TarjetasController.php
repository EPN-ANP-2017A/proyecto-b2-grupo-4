<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tarjetas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tarjeta controller.
 *
 * @Route("tarjetas")
 */
class TarjetasController extends Controller
{
    /**
     * Lists all tarjeta entities.
     *
     * @Route("/", name="tarjetas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tarjetas = $em->getRepository('AppBundle:Tarjetas')->findAll();

        return $this->render('tarjetas/index.html.twig', array(
            'tarjetas' => $tarjetas,
        ));
    }

    /**
     * Creates a new tarjeta entity.
     *
     * @Route("/new", name="tarjetas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarjeta = new Tarjeta();
        $form = $this->createForm('AppBundle\Form\TarjetasType', $tarjeta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarjeta);
            $em->flush();

            return $this->redirectToRoute('tarjetas_show', array('id' => $tarjeta->getId()));
        }

        return $this->render('tarjetas/new.html.twig', array(
            'tarjeta' => $tarjeta,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tarjeta entity.
     *
     * @Route("/{id}", name="tarjetas_show")
     * @Method("GET")
     */
    public function showAction(Tarjetas $tarjeta)
    {
        $deleteForm = $this->createDeleteForm($tarjeta);

        return $this->render('tarjetas/show.html.twig', array(
            'tarjeta' => $tarjeta,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tarjeta entity.
     *
     * @Route("/{id}/edit", name="tarjetas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tarjetas $tarjeta)
    {
        $deleteForm = $this->createDeleteForm($tarjeta);
        $editForm = $this->createForm('AppBundle\Form\TarjetasType', $tarjeta);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarjetas_edit', array('id' => $tarjeta->getId()));
        }

        return $this->render('tarjetas/edit.html.twig', array(
            'tarjeta' => $tarjeta,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tarjeta entity.
     *
     * @Route("/{id}", name="tarjetas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tarjetas $tarjeta)
    {
        $form = $this->createDeleteForm($tarjeta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarjeta);
            $em->flush();
        }

        return $this->redirectToRoute('tarjetas_index');
    }

    /**
     * Creates a form to delete a tarjeta entity.
     *
     * @param Tarjetas $tarjeta The tarjeta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tarjetas $tarjeta)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarjetas_delete', array('id' => $tarjeta->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
