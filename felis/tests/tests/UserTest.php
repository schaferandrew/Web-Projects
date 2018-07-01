<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
	public function test1() {
		//$this->assertEquals($expected, $actual);
	}
    public function test_construct() {
        $row = array('id' => 12,
            'email' => 'dude@ranch.com',
            'name' => 'Dude, The',
            'phone' => '123-456-7890',
            'address' => 'Some Address',
            'notes' => 'Some Notes',
            'password' => '12345678',
            'joined' => '2015-01-15 23:50:26',
            'role' => 'S'
        );
        $user = new Felis\User($row);
        $this->assertEquals(12, $user->getId());
        $this->assertEquals('dude@ranch.com', $user->getEmail());
        $this->assertEquals('123-456-7890', $user->getPhone());
        $this->assertEquals('Some Address', $user->getAddress());
        $this->assertEquals('Some Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-15 23:50:26'),
            $user->getJoined());
        $this->assertEquals('S', $user->getRole());
    }
    public function test_setters(){
        $row = array('id' => 12,
            'email' => 'dude@ranch.com',
            'name' => 'Dude, The',
            'phone' => '123-456-7890',
            'address' => 'Some Address',
            'notes' => 'Some Notes',
            'password' => '12345678',
            'joined' => '2015-01-15 23:50:26',
            'role' => 'S'
        );
        $user = new Felis\User($row);
        $user->setEmail("schaf170@msu.edu");
        $user->setAddress("different addres");
        $user->setName("Andrew");
        $user->setNotes("Writer");
        $user->setPhone("9892454975");
        $user->setRole("A");
        $this->assertEquals('schaf170@msu.edu', $user->getEmail());
        $this->assertEquals('9892454975', $user->getPhone());
        $this->assertEquals('different addres', $user->getAddress());
        $this->assertEquals('Writer', $user->getNotes());
        $this->assertEquals('A', $user->getRole());
    }
}

/// @endcond
