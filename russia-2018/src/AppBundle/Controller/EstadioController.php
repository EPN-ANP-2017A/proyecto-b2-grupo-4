<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estadio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Estadio controller.
 *
 * @Route("estadio")
 */
class EstadioController extends Controller
{
    /**
     * Lists all estadio entities.
     *
     * @Route("/", name="estadio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estadios = $em->getRepository('AppBundle:Estadio')->findAll();

        return $this->render('estadio/index.html.twig', array(
            'estadios' => $estadios,
        ));
    }

    /**
     * Creates a new estadio entity.
     *
     * @Route("/new", name="estadio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $estadio = new Estadio();
        $form = $this->createForm('AppBundle\Form\EstadioType', $estadio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estadio);
            $em->flush();

            return $this->redirectToRoute('estadio_show', array('id' => $estadio->getId()));
        }

        return $this->render('estadio/new.html.twig', array(
            'estadio' => $estadio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estadio entity.
     *
     * @Route("/{id}", name="estadio_show")
     * @Method("GET")
     */
    public function showAction(Estadio $estadio)
    {
        $deleteForm = $this->createDeleteForm($estadio);

        return $this->render('estadio/show.html.twig', array(
            'estadio' => $estadio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estadio entity.
     *
     * @Route("/{id}/edit", name="estadio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Estadio $estadio)
    {
        $deleteForm = $this->createDeleteForm($estadio);
        $editForm = $this->createForm('AppBundle\Form\EstadioType', $estadio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estadio_edit', array('id' => $estadio->getId()));
        }

        return $this->render('estadio/edit.html.twig', array(
            'estadio' => $estadio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estadio entity.
     *
     * @Route("/{id}", name="estadio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Estadio $estadio)
    {
        $form = $this->createDeleteForm($estadio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estadio);
            $em->flush();
        }

        return $this->redirectToRoute('estadio_index');
    }

    /**
     * Creates a form to delete a estadio entity.
     *
     * @param Estadio $estadio The estadio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estadio $estadio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadio_delete', array('id' => $estadio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
