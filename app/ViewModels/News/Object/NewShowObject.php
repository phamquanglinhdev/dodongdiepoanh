<?php

namespace App\ViewModels\News\Object;

class NewShowObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $updated_at,
        private readonly string $body,
        private readonly string $thumbnail,
        private readonly int    $type_id,
    )
    {
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
