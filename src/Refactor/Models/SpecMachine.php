<?php

declare(strict_types=1);

namespace App\Refactor\Models;

use App\Refactor\Enums\AutoEnum;
use App\Refactor\Exceptions\ValidateException;

final class SpecMachine extends AutoBase
{
    private string $extra;

    public function __construct(
        string $brand,
        string $photoFileName,
        float $carrying,
        ?string $extra,
    ) {
        parent::__construct(
            brand: $brand,
            photoFileName: $photoFileName,
            carrying: $carrying,
            type: AutoEnum::SPECIAL_AUTO->value,
        );

        $this->validate($extra);

        $this->extra = $extra;
    }

    private function validate(?string $extra): void
    {
        if (empty($extra)) {
            throw new ValidateException('extra must be not empty for SpecMachine; ');
        }
    }
}
