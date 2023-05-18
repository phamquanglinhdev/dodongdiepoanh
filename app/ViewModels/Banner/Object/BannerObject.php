<?php

namespace App\ViewModels\Banner\Object;

class BannerObject
{
    public function __construct(
        private readonly string  $id,
        private readonly string  $name,
        private readonly string  $image,
        private readonly ?string $url
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
