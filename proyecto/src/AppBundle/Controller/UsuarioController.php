<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
/**
 * Usuario controller.
 *
 * @Route("usuario")
 */
class UsuarioController extends Controller
{
    /**
     * @Route("/crear")
     */
    public function createAction(Request $request)
    {

        $usuario = new Usuario();
        //creamos el formulario
        $form = $this->createForm('AppBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        //Guardamos en la base de datos
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            //return usuario$this->redirectToRoute('', array('id' => $rol->getId()));
        }
        //renderisa la vista del formulario
        return $this->render('usuario/new.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/listar/usuario")
     */
    public function listAction()
    {
        return $this->render('AppBundle:Usuario:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/actualizar/usuario")
     */
    public function udateAction()
    {
        return $this->render('AppBundle:Usuario:udate.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete/usuario")
     */
    public function deleteAction()
    {
        return $this->render('AppBundle:Usuario:delete.html.twig', array(
            // ...
        ));
    }

}
