<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GolesXPartido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Golesxpartido controller.
 *
 * @Route("golesxpartido")
 */
class GolesXPartidoController extends Controller
{
    /**
     * Lists all golesXPartido entities.
     *
     * @Route("/", name="golesxpartido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $golesXPartidos = $em->getRepository('AppBundle:GolesXPartido')->findAll();

        return $this->render('golesxpartido/index.html.twig', array(
            'golesXPartidos' => $golesXPartidos,
        ));
    }

    /**
     * Creates a new golesXPartido entity.
     *
     * @Route("/new", name="golesxpartido_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $golesXPartido = new Golesxpartido();
        $form = $this->createForm('AppBundle\Form\GolesXPartidoType', $golesXPartido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($golesXPartido);
            $em->flush();

            return $this->redirectToRoute('golesxpartido_show', array('id' => $golesXPartido->getId()));
        }

        return $this->render('golesxpartido/new.html.twig', array(
            'golesXPartido' => $golesXPartido,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a golesXPartido entity.
     *
     * @Route("/{id}", name="golesxpartido_show")
     * @Method("GET")
     */
    public function showAction(GolesXPartido $golesXPartido)
    {
        $deleteForm = $this->createDeleteForm($golesXPartido);

        return $this->render('golesxpartido/show.html.twig', array(
            'golesXPartido' => $golesXPartido,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing golesXPartido entity.
     *
     * @Route("/{id}/edit", name="golesxpartido_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GolesXPartido $golesXPartido)
    {
        $deleteForm = $this->createDeleteForm($golesXPartido);
        $editForm = $this->createForm('AppBundle\Form\GolesXPartidoType', $golesXPartido);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('golesxpartido_edit', array('id' => $golesXPartido->getId()));
        }

        return $this->render('golesxpartido/edit.html.twig', array(
            'golesXPartido' => $golesXPartido,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a golesXPartido entity.
     *
     * @Route("/{id}", name="golesxpartido_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GolesXPartido $golesXPartido)
    {
        $form = $this->createDeleteForm($golesXPartido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($golesXPartido);
            $em->flush();
        }

        return $this->redirectToRoute('golesxpartido_index');
    }

    /**
     * Creates a form to delete a golesXPartido entity.
     *
     * @param GolesXPartido $golesXPartido The golesXPartido entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GolesXPartido $golesXPartido)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('golesxpartido_delete', array('id' => $golesXPartido->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
