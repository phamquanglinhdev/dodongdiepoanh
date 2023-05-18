<?php

namespace App\ViewModels\Page\Object;

class PageEditObject
{
    public function __construct(
        private readonly int    $id,
        private readonly string $title,
        private readonly string $body,
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
}
