<?php

namespace App\ViewModels\Menu\Object;

class MenuObject
{
    public function __construct(
        private readonly string  $title,
        private readonly ?string $url,
        private readonly ?array  $children,
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
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return MenuObject[]|null
     */
    public function getChildren(): ?array
    {
        return $this->children;
    }
}
