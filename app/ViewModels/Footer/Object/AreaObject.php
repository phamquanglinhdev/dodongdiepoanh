<?php

namespace App\ViewModels\Footer\Object;

class AreaObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $url
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
    public function getUrl(): string
    {
        return $this->url;
    }
}
