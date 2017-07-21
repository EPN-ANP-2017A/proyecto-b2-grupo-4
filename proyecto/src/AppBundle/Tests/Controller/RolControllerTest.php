<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RolControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/nuevo/rol');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listar/rol');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actualizar/rol');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/borrar/rol');
    }

}
