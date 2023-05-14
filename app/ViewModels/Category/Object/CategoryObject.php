<?php

namespace App\ViewModels\Category\Object;

class CategoryObject
{
    public function __construct(
        readonly private string $id,
        readonly private string $title,
        readonly private string $url,
        readonly private array  $children,
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return CategoryObject[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }
}
