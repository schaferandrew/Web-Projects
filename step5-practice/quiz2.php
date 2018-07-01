<?php

class QuadraticTest extends \PHPUnit_Framework_TestCase
{
    public function testFullRootsHTML() {
        $quad = new Quadratic(1,1,-1);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>The roots of x<sup>2</sup> + x - 1 are -1.618 and 0.618.</p>', $html);
        
        $quad = new Quadratic(0,1,1) ;
        $html = $quad->rootsHtml();
        $this->assertContains('<p>x + 1 has no roots.</p>', $html);
        
        $quad = new Quadratic(4,0,-36);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>The roots of 4x<sup>2</sup>', $html);
        $this->assertContains('- 36', $html);
        
        $quad = new Quadratic(1,0,0);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>The roots of x<sup>2</sup>', $html);
     
        $quad = new Quadratic(1,1,0);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>The roots of x<sup>2</sup> + x', $html);
        
        $quad = new Quadratic(0,0,0);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>0 has no roots.</p>', $html);
        
        $quad = new Quadratic(0,1,0);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>x ', $html);
        $this->assertContains('has no roots.</p>', $html);
        
        $quad = new Quadratic(0,0,1);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>1 has no roots.</p>', $html);
        
        $quad = new Quadratic(-4,1,-1);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>-4x<sup>2</sup> + x - 1 has no roots.</p>', $html);
    
        $quad = new Quadratic(-1,-1,0);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>The roots of -x<sup>2</sup> - x', $html);
        
        $quad = new Quadratic(0,1,1);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>x + 1 has no roots.</p>', $html);

        $quad = new Quadratic(0,1,-1);
        $html = $quad->rootsHtml();
        $this->assertContains('<p>x - 1 has no roots.</p>', $html);
    }
}