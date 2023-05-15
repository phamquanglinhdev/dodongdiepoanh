<?php

namespace App\ViewModels\Product\Object;

class ProductListObject
{
    public function __construct(
        readonly private int    $id,
        readonly private string $name,
        readonly private string $category_name,
        readonly private int $category_id,
        readonly private string $size,
        readonly private string $code,
        readonly private string $thumbnail,
    )
    {
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }
}
