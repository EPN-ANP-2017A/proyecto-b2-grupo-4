<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EquipoControllerTest extends WebTestCase
{
    public function testRegistrar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/equipo/registrar');
    }

    public function testModificar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/equipo/modificar');
    }

}
