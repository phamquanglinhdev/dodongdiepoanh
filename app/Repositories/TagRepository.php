<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TagRepository extends BaseRepository
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function findByName($name): Model|Builder|null
    {
        return $this->getBuilder()->where("name", $name)->first();
    }
}
