<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiGenreListControllerTest extends WebTestCase
{
    public function testGetGenreListWithoutJWT(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/genre/list');

        $this->assertResponseStatusCodeSame(401);
    }
}
