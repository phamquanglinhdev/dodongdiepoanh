<?php

namespace App\ViewModels\Product\Object;

class ProductShowObject
{
    public function __construct(
        private readonly string $name,
        private readonly string $category_id,
        private readonly string $category_name,
        private readonly string $thumbnail_1,
        private readonly string $thumbnail_2,
        private readonly string $thumbnail_3,
        private readonly string $thumbnail_4,
        private readonly string $thumbnail_5,
        private readonly string $description,
        private readonly string $code,
        private readonly string $size,
        private readonly string $material,
        private readonly string $status,
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
    public function getCategoryId(): string
    {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @return string
     */
    public function getThumbnail1(): string
    {
        return $this->thumbnail_1;
    }

    /**
     * @return string
     */
    public function getThumbnail2(): string
    {
        return $this->thumbnail_2;
    }

    /**
     * @return string
     */
    public function getThumbnail3(): string
    {
        return $this->thumbnail_3;
    }

    /**
     * @return string
     */
    public function getThumbnail4(): string
    {
        return $this->thumbnail_4;
    }

    /**
     * @return string
     */
    public function getThumbnail5(): string
    {
        return $this->thumbnail_5;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getMaterial(): string
    {
        return $this->material;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}
