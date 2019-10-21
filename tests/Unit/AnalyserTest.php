<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\analyser\Analyser;

class AnalyserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMaxDistance()
    {

    	$el = new Analyser("a123456a");
    	$distance = $el->getMaxDistance("a");
        $this->assertEquals(6, $distance);


        $el = new Analyser("a12aa56a");
    	$distance = $el->getMaxDistance("a");
        $this->assertEquals(6, $distance);

        $el = new Analyser("aa");
    	$distance = $el->getMaxDistance("a");
        $this->assertEquals(0, $distance);
    }

}
