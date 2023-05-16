<?php

namespace App\ViewModels\Page;

class PageOptionObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $slug,
    )
    {
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
    public function getTitle(): string
    {
        return $this->title;
    }
}
