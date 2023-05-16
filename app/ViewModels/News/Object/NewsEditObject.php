<?php

namespace App\ViewModels\News\Object;

class NewsEditObject
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly string $body,
        private readonly string $thumbnail,
        private readonly string $description,
        private readonly int    $type_id,
        private readonly int    $draft,
        private readonly int    $pin,
    )
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @return int
     */
    public function getDraft(): int
    {
        return $this->draft;
    }

    /**
     * @return int
     */
    public function getPin(): int
    {
        return $this->pin;
    }
}
