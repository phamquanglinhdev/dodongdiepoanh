<?php

namespace App\ViewModels\News\Object;

class TopNewsObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $slug,
        private readonly string $type,
    )
    {
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
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
