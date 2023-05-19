<?php

namespace App\ViewModels\News\Object;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class NewShowObject
{
    public function __construct(
        private readonly string           $title,
        private readonly string           $updated_at,
        private readonly string           $body,
        private readonly string           $thumbnail,
        private readonly int              $type_id,
        private readonly Collection|array $tags,
    )
    {
    }

    /**
     * @return NewTagsObject[]
     */
    public function getTags(): array
    {
        return $this->tags->map(fn(Tag $tag) => new NewTagsObject(
            id: $tag["id"], name: $tag['name']
        ));
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_id == 0 ? "Tin tức thường" : "Tin tức doanh nghiệp";
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }
}
