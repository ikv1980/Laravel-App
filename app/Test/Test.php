<?php

namespace App\Test;

class Test
{

    protected array $config = [];
    public function __construct(array $config = ['foo' => 'default'])
    {
        $this->config = $config;
    }

    public function foo(){
        return 'bar';
    }
}
