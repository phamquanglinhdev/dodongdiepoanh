<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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

    public function listAll(): Collection|array
    {
        return $this->getBuilder()->orderBy("created_at")->get();
    }

    public function getById($id)
    {
        return $this->getBuilder()->where("id", $id)->firstOrFail();
    }
}
