<?php

declare(strict_types=1);

namespace App\Refactor\Models;

abstract class AutoBase
{
    public function __construct(
        protected string $brand,
        protected string $photoFileName,
        protected float $carrying,
        protected string $type,
    ) {
        $this->brand = $brand;
        $this->photoFileName = $photoFileName;
        $this->carrying = $carrying;
        $this->type = $type;
    }

    public function getPhotoFileExt(): string
    {
        return '.' . pathinfo($this->photoFileName, PATHINFO_EXTENSION);
    }
}
