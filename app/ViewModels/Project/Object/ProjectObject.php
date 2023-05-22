<?php

namespace App\ViewModels\Project\Object;

class ProjectObject
{
    public function __construct(
        readonly private string $name,
        readonly private string $thumbnail
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }
}
