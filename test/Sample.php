<?php

namespace Project\Module;

class Greeting
{
    public function morning()
    {
        echo "good morning!" . PHP_EOL;
    }

    public function noon()
    {
        echo "good afternoon!" . PHP_EOL;
    }

    public function night()
    {
        echo "good nignht!" . PHP_EOL;
    }
}

function hello()
{
    echo "hello, PHP!" . PHP_EOL;
}

const ID = 1234;
