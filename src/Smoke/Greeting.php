<?php
namespace Smoke;


class Greeting
{

    public function greet($name = 'World')
    {
        return "Hello ${name}!";
    }

}
