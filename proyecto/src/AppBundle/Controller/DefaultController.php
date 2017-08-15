<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);

        $em = $this->getDoctrine()->getManager();
        $equipos = $em->getRepository('AppBundle:Equipo')->findAll();
        $jugadors = $em->getRepository('AppBundle:Jugador')->findAll();
        $partidos = $em->getRepository('AppBundle:Partido')->findAll();
        $goles = $em->getRepository('AppBundle:Goles')->findAll();
        $tarjetas = $em->getRepository('AppBundle:Tarjetas')->findAll();
        return $this->render('default/index.html.twig', array(
            'equipos' => $equipos,
            'jugadors' => $jugadors,
            'partidos' => $partidos,
            'goles' => $goles,
            'tarjetas' => $tarjetas,
        ));
    }
}
