<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(
        private readonly Model|Builder $model
    )
    {
    }

    /**
     * @return Builder|Model
     */
    public function getBuilder(): Model|Builder
    {
        return $this->model;
    }
}
