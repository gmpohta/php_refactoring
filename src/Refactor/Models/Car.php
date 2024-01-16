<?php

declare(strict_types=1);

namespace App\Refactor\Models;

use App\Refactor\Enums\AutoEnum;
use App\Refactor\Exceptions\ValidateException;

final class Car extends AutoBase
{
    private int $passengerSeatsCount;

    public function __construct(
        string $brand,
        string $photoFileName,
        float $carrying,
        ?int $passengerSeatsCount,
    ) {
        parent::__construct(
            brand: $brand,
            photoFileName: $photoFileName,
            carrying: $carrying,
            type: AutoEnum::CAR->value,
        );

        $this->validate($passengerSeatsCount);

        $this->passengerSeatsCount = $passengerSeatsCount;
    }

    private function validate(?int $passengerSeatsCount): void
    {
        if (empty($passengerSeatsCount)) {
            throw new ValidateException('passengerSeatsCount must be not empty for Car; ');
        }
    }
}
