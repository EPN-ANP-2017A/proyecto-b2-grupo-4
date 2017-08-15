<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response(
            '<html>
                    <body>
                    <div>
                    <h4>Admin page!</h4>
                    </div>
                    <div>
                        <ol>
                            <li><a href="admin/equipo">Administrar equipos</a></li>
                            <li><a href="admin/jugador">Administrar jugadores</a></li>
                            <li><a href="admin/partido">Administrar partidos</a></li>
                            <li><a href="admin/goles">Administrar goles</a></li>
                            <li><a href="admin/tarjetas">Administrar tarjetas</a></li>
                        </ol>
                    </div>
                    </body>
                    </html>');
    }
}
