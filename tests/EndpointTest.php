<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EndpointTest extends WebTestCase
{
    public function testTriangleEndPointSuccess(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/triangle/2/3/4');
        $response = $client->getResponse();
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseIsSuccessful();
        $responseData = json_decode($response->getContent(), true);
    }

    public function testCircleEndPointSuccess(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/circle/6');
        $response = $client->getResponse();
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseIsSuccessful();
        $responseData = json_decode($response->getContent(), true);
    }

    public function testTriangleRouteNotAllowed(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/triangle/string/3/2');
        $response = $client->getResponse();
        $this->assertSame(404, $response->getStatusCode());
    }

    public function testCircleRouteNotAllowed(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/circle/string');
        $response = $client->getResponse();
        $this->assertSame(404, $response->getStatusCode());
    }
}
