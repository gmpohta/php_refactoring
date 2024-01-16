<?php

declare(strict_types=1);

namespace App\Refactor\Models;

use App\Refactor\Enums\AutoEnum;

final class Truck extends AutoBase
{
    public float $bodyWidth = 0;

    public float $bodyHeight = 0;

    public float $bodyLength = 0;

    public function __construct(
        string $brand,
        string $photoFileName,
        float $carrying,
        string $bodyWhl = null,
    ) {
        parent::__construct(
            brand: $brand,
            photoFileName: $photoFileName,
            carrying: $carrying,
            type: AutoEnum::TRUCK->value,
        );

        $paramenters = explode('x', $bodyWhl ?? '');

        if (count($paramenters) > 2) {
            $this->bodyWidth = (float) $paramenters[0];
            $this->bodyHeight = (float) $paramenters[1];
            $this->bodyLength = (float) $paramenters[2];
        }
    }

    public function getBodyVolume(): float
    {
        return $this->bodyWidth * $this->bodyLength * $this->bodyHeight;
    }
}
