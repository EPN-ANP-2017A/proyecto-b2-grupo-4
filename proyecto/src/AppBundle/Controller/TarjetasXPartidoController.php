<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TarjetasXPartido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tarjetasxpartido controller.
 *
 * @Route("tarjetasxpartido")
 */
class TarjetasXPartidoController extends Controller
{
    /**
     * Lists all tarjetasXPartido entities.
     *
     * @Route("/", name="tarjetasxpartido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tarjetasXPartidos = $em->getRepository('AppBundle:TarjetasXPartido')->findAll();

        return $this->render('tarjetasxpartido/index.html.twig', array(
            'tarjetasXPartidos' => $tarjetasXPartidos,
        ));
    }

    /**
     * Creates a new tarjetasXPartido entity.
     *
     * @Route("/new", name="tarjetasxpartido_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tarjetasXPartido = new Tarjetasxpartido();
        $form = $this->createForm('AppBundle\Form\TarjetasXPartidoType', $tarjetasXPartido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tarjetasXPartido);
            $em->flush();

            return $this->redirectToRoute('tarjetasxpartido_show', array('id' => $tarjetasXPartido->getId()));
        }

        return $this->render('tarjetasxpartido/new.html.twig', array(
            'tarjetasXPartido' => $tarjetasXPartido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tarjetasXPartido entity.
     *
     * @Route("/{id}", name="tarjetasxpartido_show")
     * @Method("GET")
     */
    public function showAction(TarjetasXPartido $tarjetasXPartido)
    {
        $deleteForm = $this->createDeleteForm($tarjetasXPartido);

        return $this->render('tarjetasxpartido/show.html.twig', array(
            'tarjetasXPartido' => $tarjetasXPartido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tarjetasXPartido entity.
     *
     * @Route("/{id}/edit", name="tarjetasxpartido_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TarjetasXPartido $tarjetasXPartido)
    {
        $deleteForm = $this->createDeleteForm($tarjetasXPartido);
        $editForm = $this->createForm('AppBundle\Form\TarjetasXPartidoType', $tarjetasXPartido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarjetasxpartido_edit', array('id' => $tarjetasXPartido->getId()));
        }

        return $this->render('tarjetasxpartido/edit.html.twig', array(
            'tarjetasXPartido' => $tarjetasXPartido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tarjetasXPartido entity.
     *
     * @Route("/{id}", name="tarjetasxpartido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TarjetasXPartido $tarjetasXPartido)
    {
        $form = $this->createDeleteForm($tarjetasXPartido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tarjetasXPartido);
            $em->flush();
        }

        return $this->redirectToRoute('tarjetasxpartido_index');
    }

    /**
     * Creates a form to delete a tarjetasXPartido entity.
     *
     * @param TarjetasXPartido $tarjetasXPartido The tarjetasXPartido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TarjetasXPartido $tarjetasXPartido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tarjetasxpartido_delete', array('id' => $tarjetasXPartido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
