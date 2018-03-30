<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use Illuminate\Container\Container;

abstract class Repository implements RepositoryInterface
{

    protected $model;

    public function __construct(Container $app)
    {
        $this->model = $app->make($this->model());
    }

    abstract function model();
    
}