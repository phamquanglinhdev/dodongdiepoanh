<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SettingRepository extends BaseRepository
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function getByName(string $name): Model|Builder|null
    {
        return $this->getBuilder()->where("name", $name)->first();
    }
}
