<?php

namespace App\ViewModels\News\Object;

class NewTagsObject
{
    public function __construct(
        private readonly int    $id,
        private readonly string $name,
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
    public function getName(): string
    {
        return $this->name;
    }
}
