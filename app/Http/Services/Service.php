<?php

namespace App\Http\Services;

use Illuminate\Container\Container;

abstract class Service
{
    protected $interface;

    public function __construct(Container $app)
    {
        $this->interface = $app->make($this->interface());
    }

    abstract public function interface();
}