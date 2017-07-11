<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PartidoController extends Controller
{
    /**
     * @Route("/partido/jugar")
     */
    public function jugarAction()
    {
        return $this->render('AppBundle:Partido:jugar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/partido/modificar")
     */
    public function modificarAction()
    {
        return $this->render('AppBundle:Partido:modificar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/equipo/listar")
     */
    public function listarAction()
    {
        return $this->render('AppBundle:Partido:listar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/partido/eliminar")
     */
    public function eliminarAction()
    {
        return $this->render('AppBundle:Partido:eliminar.html.twig', array(
            // ...
        ));
    }


}
