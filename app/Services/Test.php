<?php

namespace App\Services;

class Test
{

    public function __construct(
        protected array $config = [],
        protected string $test = '',
    )
    {
    }

    public function config(string $key)
    {
        return $this->config[$key] ?? null;
    }

    public function set(string $test){
        $this->test = $test;
    }

    public function get(){
        return $this->test;
    }
}
