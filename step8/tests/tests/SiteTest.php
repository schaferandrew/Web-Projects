<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function test1() {
		//$this->assertEquals($expected, $actual);
	}
	public function siteBasics() {
	    $site = new Felis\Site();
	    $site->dbConfigure("git","Andrew", "1234", "mr");

	    $site->setEmail("schaf170@msu.edu");
	    $this->assertEquals("schaf170@msu.edu", $site->getEmail());

	    $site->setRoot("arctic");
	    $this->assertEquals("arctice", $site->getRoot());

	    $this->assertEquals("mr", $site->getTablePrefix());
    }
    public function test_localize() {
        $site = new Felis\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test8_', $site->getTablePrefix());
    }
}

/// @endcond
