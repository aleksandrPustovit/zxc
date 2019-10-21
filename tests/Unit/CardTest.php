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
    public function testChanceCalculator()
    {
        $result = CardGame::chanceOfgettingOneCard(50);
        $this->assertEquals("2.00", $result);

        $result = CardGame::chanceOfgettingOneCard(2);
        $this->assertEquals("50.00", $result);

        $result = CardGame::chanceOfgettingOneCard(10);
        $this->assertEquals("10.00", $result);
    }
}
