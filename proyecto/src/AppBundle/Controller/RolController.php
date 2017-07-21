<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Rol;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;



/**
 * Rol controller.
 *
 * @Route("rol")
 */
class RolController extends Controller
{
    /**
     * @Route("/crear")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $rol = new Rol();
        //creamos el formulario
        $form = $this->createForm('AppBundle\Form\RolType', $rol);
        $form->handleRequest($request);
        //Guardamos en la base de datos
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rol);
            $em->flush();

            //return $this->redirectToRoute('', array('id' => $rol->getId()));
        }
        //renderisa la vista del formulario
        return $this->render('rol/new.html.twig', array(
            'rol' => $rol,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/listar")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Rol:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/actualizar")
     */
    public function updateAction()
    {
        return $this->render('AppBundle:Rol:update.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/borrar")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:Rol:delete.html.twig', array(
            // ...
        ));
    }

}
