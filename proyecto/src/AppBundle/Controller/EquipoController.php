<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class EquipoController extends Controller
{
    /**
     * @Route("/equipo/registrar")
     */
    public function registrarAction()
    {
        return $this->render('AppBundle:Equipo:registrar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/equipo/modificar")
     */
    public function modificarAction()
    {
        return $this->render('AppBundle:Equipo:modificar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/equipo/listar")
     */
    public function listarAction()
    {
        return $this->render('AppBundle:Equipo:listar.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/equipo/eliminar")
     */
    public function eliminarAction()
    {
        return $this->render('AppBundle:Equipo:eliminar.html.twig', array(
            // ...
        ));
    }


}
