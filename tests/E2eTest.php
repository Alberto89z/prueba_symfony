<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Panther\PantherTestCase;

class E2eTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/register/user');
        $client->submitForm('Guardar', [
            'user[name]' => 'Kellogs',
            'user[password]' => 'p4sw06d',
            'user[email]' => 'me2@automat.ed',
        ]);
        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertSelectorTextContains('h1', 'Hello');
        // $client = static::createClient();

        // // Request a specific page
        // // $crawler = $client->request('GET', '/');
        // $crawler = $client->request('GET', '/');
        // var_dump($crawler);

        // // Validate a successful response and some content
        // $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h1', 'Hello');
        // $client = static::createPantherClient();
        // $crawler = $client->request('GET', '/register/user');

        // $this->assertSelectorTextContains('h1', 'Hello World');
    }
}
