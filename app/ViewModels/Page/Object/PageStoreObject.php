<?php

namespace App\ViewModels\Page\Object;

use Illuminate\Support\Str;

class PageStoreObject
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

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'slug' => Str::slug($this->getTitle(), "-"),
            'body' => $this->getBody()
        ];
    }

}
