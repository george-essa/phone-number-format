<?php

namespace App\Repository\Core;

use App\Repository\Core\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function all()
    {
        return $this->model->all();
    }
}