<?php

class QuadraticTest extends \PHPUnit_Framework_TestCase
{
    public function testEmpty() {
        $this->assertEquals(true, true);
    }
    public function testNull() {
        $quad = new Quadratic(1, 0, 10);
        $roots = $quad->roots();
        $this->assertEquals(0, count($roots));
    }
    public function testQuad() {
        $quad = new Quadratic(1,1,-1);
        $roots = $quad->roots();
        $this->assertEquals(-1.618, $roots[0],"should be -1.618", .001);
        $this->assertEquals(.618, $roots[1], "should be .618", .001);
    }
    public function testQuad2() {
        $quad = new Quadratic(-1, 0.5, 1);
        $roots = $quad->roots();
        $this->assertEquals(1.281, $roots[0],"should be 1.281", .001);
        $this->assertEquals(-0.78077, $roots[1], "should be -.781", .001);
    }
    public function testNotQuadratic() {
        $quad = new Quadratic(0,1,1);
        $roots = $quad->roots();
        $this->assertEquals(0, count($roots));

        
    }
}