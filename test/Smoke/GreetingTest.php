<?php
use Smoke\Greeting;


class GreetingTest extends PHPUnit_Framework_TestCase
{

    public function setup()
    {
        $this->object = new Greeting();
    }

    public function testEmpty()
    {
        $expected = 'Hello World!';
        $returned = $this->object->greet();

        $this->assertEquals($expected, $returned);
    }

    public function testHello()
    {
        $name     = 'Test';
        $expected = 'Hello Test!';
        $returned = $this->object->greet($name);

        $this->assertEquals($expected, $returned);
    }

}
