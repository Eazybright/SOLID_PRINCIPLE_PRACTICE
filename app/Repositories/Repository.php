<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

abstract class Repository
{
    /**
    ** @return Collection
    **/
    abstract function all(): Collection;
} 