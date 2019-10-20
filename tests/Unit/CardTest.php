<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\card\cardGame;

class CardTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $result = CardGame::chanceOfgettingOneCard(50);
        var_dump($result);
        $this->assertTrue(true);
    }
}
