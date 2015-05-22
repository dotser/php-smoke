<?php
/**
 * Summary for this file
 */
namespace Smoke;


/**
 * Be friendly with people and greet them
 *
 * @package Smoke
 */
class Greeting
{

    /**
     * Greet humans
     *
     * @param string $name The human name
     *
     * @return string
     */
    public function greet($name = 'World')
    {
        return "Hello ${name}!";
    }

}
