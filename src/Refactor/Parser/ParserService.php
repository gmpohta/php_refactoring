<?php

declare(strict_types=1);

namespace App\Refactor\Parser;

use App\Refactor\Exceptions\ValidateException;
use App\Refactor\Models\AutoBase;
use App\Refactor\Models\AutoFactory;
use App\Refactor\Parser\DTO\AutoDto;

final class ParserService
{
    public const MAX_STRING_LEN = 10000;

    public const SEPARATOR = ';';

    /**
     * @return array<int, AutoBase>
     */
    public function __invoke(string $csvFilename): array
    {
        $carList = [];
        $handle = fopen($csvFilename, 'r');

        if (false !== $handle) {
            $keys = fgetcsv($handle, self::MAX_STRING_LEN, self::SEPARATOR);

            if (false !== $keys) {
                while (($values = fgetcsv($handle, self::MAX_STRING_LEN, self::SEPARATOR)) !== false) {
                    try {
                        $dto = new AutoDto($keys, $values);
                        array_push($carList, AutoFactory::create($dto));
                    } catch (ValidateException|\TypeError $e) {
                        echo 'Line skiped, error: ' . $e->getMessage();
                    }
                }
            }

            fclose($handle);
        }

        return $carList;
    }
}
