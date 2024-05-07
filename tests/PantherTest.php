<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class PantherTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/prueba');

        $this->assertSelectorTextContains('h1', 'Hello Worlds');
    }
}
