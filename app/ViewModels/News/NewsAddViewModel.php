<?php

namespace App\ViewModels\News;

use App\Models\Tag;
use App\ViewModels\News\Object\NewTagsObject;
use Illuminate\Database\Eloquent\Collection;

class NewsAddViewModel
{
    public function __construct(
        private readonly Collection $tags
    )
    {
    }

    /**
     * @return NewTagsObject[]
     */
    public function getTags(): array
    {
        return $this->tags->map(fn(Tag $tag) => new NewTagsObject(id: $tag["id"], name: $tag["name"]))->toArray();
    }
}
