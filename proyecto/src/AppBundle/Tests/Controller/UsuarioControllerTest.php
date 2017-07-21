<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsuarioControllerTest extends WebTestCase
{
    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crear/usuario');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listar/usuario');
    }

    public function testUdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actualizar/usuario');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete/usuario');
    }

}
