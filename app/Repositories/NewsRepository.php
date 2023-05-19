<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;


class NewsRepository extends BaseRepository
{
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function create(array $attribute): Model|Builder
    {
        return $this->getBuilder()->create($attribute);
    }

    public function getNewBySlug(string $slug): Model|Builder
    {
        return $this->getBuilder()->where("draft", 0)->where("slug", $slug)->firstOrFail();
    }

    public function getNewById(string $id): Model|Builder
    {
        return $this->getBuilder()->where("id", $id)->firstOrFail();
    }

    public function getNewsByType($type = 0, $paginate = 15): LengthAwarePaginator
    {
        return $this->getBuilder()->where("draft", 0)->where("type_id", $type)->orderBy("pin", "DESC")->orderBy("created_at", "DESC")->paginate($paginate);
    }

    public function uploadThumbnail(UploadedFile $file): string
    {
        $file->move(public_path() . "/uploads/news/", $file->getClientOriginalName());
        return "uploads/news/" . $file->getClientOriginalName();
    }

    public function getMostNewsByView(): array|Collection
    {
        return $this->getBuilder()
            ->where("draft", 0)
            ->orderBy("created_at", "DESC")
            ->orderBy("pin", "DESC")
            ->orderBy("view", "DESC")
            ->limit(4)->get();
    }

    public function getMostNewByCreatedAt(): array|Collection
    {
        return $this->getBuilder()
            ->where("draft", 0)
            ->orderBy("created_at", "DESC")
            ->limit(4)->get();
    }

    public function getTopNormalNew(): array|Collection
    {
        return $this->getBuilder()
            ->where("type_id", 0)
            ->where("draft", 0)
            ->orderBy("pin", "DESC")
            ->limit(4)->get();
    }
    public function getTopBusinessNew(): array|Collection
    {
        return $this->getBuilder()
            ->where("type_id", 1)
            ->where("draft", 0)
            ->orderBy("pin", "DESC")
            ->limit(4)->get();
    }
}
