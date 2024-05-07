<?php

namespace App\Test\Entity;

use App\Entity\Games;
use PHPUnit\Framework\TestCase;

class GamesTest extends TestCase
{
    public function testName(): void
    {
        $game = new Games();

        $nombre = $game->juego('Nier Automata');

        $this->assertEquals('¡Hola, tu juego es Nier Automata asdasd!',$nombre);
    }
}
