<?php

namespace App\ViewModels\Page\Object;

class PageObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $body,
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
    public function getBody(): string
    {
        return $this->body;
    }
}
