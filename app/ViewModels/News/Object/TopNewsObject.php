<?php

namespace App\ViewModels\News\Object;

use Illuminate\Support\Carbon;

class TopNewsObject
{
    public function __construct(
        private readonly string $title,
        private readonly string $slug,
        private readonly string $type,
        private readonly string $updated_at,
    )
    {
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return Carbon::parse($this->updated_at)->isoFormat("D/M/Y");
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
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
