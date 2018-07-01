<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * Empty unit testing template/database version
 * @cond 
 * Unit tests for the class
 */

class EmptyDBTest extends \PHPUnit_Extensions_Database_TestCase
{
	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {

        return $this->createDefaultDBConnection(self::$site->pdo(), 'schaf170');
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/user.xml');

        //return $this->createFlatXMLDataSet(dirname(__FILE__) . 
		//	'/db/users.xml');
    }
    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Felis\Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    public function test_construct() {
        $users = new Felis\Users(self::$site);
        $this->assertInstanceOf('Felis\Users', $users);
    }
    public function test_login() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on email address
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertInstanceOf('Felis\User', $user);

        //additions to login based on email
        $this->assertContains("Dudess, The",$user->getName());
        $this->assertContains("111-222-3333",$user->getPhone());
        $this->assertContains("Dudess Address",$user->getAddress());
        $this->assertContains("Dudess Notes",$user->getNotes());
        $this->assertEquals(1421988626,$user->getJoined());
        $this->assertContains("S",$user->getRole());


        // Test a valid login based on email address
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertInstanceOf('Felis\User', $user);

        // Test a failed login
        $user = $users->login("dudess@dude.com", "wrongpw");
        $this->assertNull($user);



    }

    public function test_get(){
        $users = new Felis\Users(self::$site);
        $user = $users->get(7);
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertContains("Dudess, The",$user->getName());
        $this->assertContains("111-222-3333",$user->getPhone());
        $this->assertContains("Dudess Address",$user->getAddress());
        $this->assertContains("Dudess Notes",$user->getNotes());
        $this->assertEquals(1421988626,$user->getJoined());
        $this->assertContains("S",$user->getRole());
    }
	
}

/// @endcond
