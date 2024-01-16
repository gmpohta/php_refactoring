<?php

declare(strict_types=1);

namespace App\Refactor\Models;

use App\Refactor\Enums\AutoEnum;
use App\Refactor\Exceptions\ValidateException;
use App\Refactor\Parser\DTO\AutoDto;

final class AutoFactory
{
    public static function create(AutoDto $auto): AutoBase
    {
        return match ($auto->carType) {
            AutoEnum::CAR->value => new Car(
                brand: $auto->brand,
                photoFileName: $auto->photoFileName,
                carrying: $auto->carrying,
                passengerSeatsCount: $auto->passengerSeatsCount
            ),
            AutoEnum::TRUCK->value => new Truck(
                brand: $auto->brand,
                photoFileName: $auto->photoFileName,
                carrying: $auto->carrying,
                bodyWhl: $auto->bodyWhl,
            ),
            AutoEnum::SPECIAL_AUTO->value => new SpecMachine(
                brand: $auto->brand,
                photoFileName: $auto->photoFileName,
                carrying: $auto->carrying,
                extra: $auto->extra,
            ),
            default => throw new ValidateException('Unknown auto'),
        };
    }
}
