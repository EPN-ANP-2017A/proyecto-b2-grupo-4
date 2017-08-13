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
        // $em2 = $this->getDoctrine()->getManager();

        $jugadors = $em->getRepository('AppBundle:Jugador')->findAll();
        $equipos = $em->getRepository('AppBundle:Equipo')->findAll();
        $partidos = $em->getRepository('AppBundle:Partido')->findAll();
        $golesXPartidos = $em->getRepository('AppBundle:GolesXPartido')->findAll();
        $tarjetasXPartidos = $em->getRepository('AppBundle:TarjetasXPartido')->findAll();


        return $this->render('default/index.html.twig', array(
            'jugadors' => $jugadors,
            'equipos' => $equipos,
            'partidos' => $partidos,
            'golesXPartidos' => $golesXPartidos,
            'tarjetasXPartidos' => $tarjetasXPartidos
        ));
    }
}
