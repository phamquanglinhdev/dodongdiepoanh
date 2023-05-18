<?php

namespace App\ViewModels\News\Object;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Str;

class NewsStoreObject
{
    public function __construct(
        readonly private string              $author_id,
        readonly private string              $title,
        readonly private string              $body,
        readonly private int                 $type_id,
        readonly private ?int                $draft,
        readonly private ?int                $pin,
        readonly private UploadedFile|string $thumbnail,
        readonly private string              $description,

    )
    {
    }

    /**
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'body' => $this->getBody(),
            'type_id' => $this->getTypeId(),
            'draft' => $this->getDraft() ?? 0,
            'pin' => $this->getPin() ?? 0,
            'thumbnail' => $this->getThumbnail(),
            'description' => $this->getDescription(),
            'slug' => Str::slug($this->getTitle()),
            'author_id' => $this->getAuthorId(),
        ];
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

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->type_id;
    }

    /**
     * @return int|null
     */
    public function getDraft(): ?int
    {
        return $this->draft;
    }

    /**
     * @return int|null
     */
    public function getPin(): ?int
    {
        return $this->pin;
    }

    /**
     * @return UploadedFile|string
     */
    public function getThumbnail(): UploadedFile|string
    {
        return $this->thumbnail;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
