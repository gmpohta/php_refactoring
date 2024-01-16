<?php

declare(strict_types=1);

namespace App\Refactor\Parser\DTO;

use App\Refactor\Exceptions\ValidateException;

final class AutoDto
{
    public ?string $carType;

    public string $brand = '';

    public ?int $passengerSeatsCount;

    public string $photoFileName = '';

    public ?string $bodyWhl;

    public float $carrying = 0;

    public ?string $extra;

    /**
     * @param array<int, string> $keys
     * @param array<int, string> $values
     */
    public function __construct(array $keys, array $values)
    {
        if (7 !== count($keys) || count($keys) !== count($values)) {
            throw new ValidateException('the string: ' . implode(', ', $values) . ' not valid; ');
        }

        $data = array_combine($keys, $values);

        $this->carType = $data['car_type'];
        $this->brand = $data['brand'];
        $this->passengerSeatsCount = (int) $data['passenger_seats_count'];
        $this->photoFileName = $data['photo_file_name'];
        $this->bodyWhl = $data['body_whl'];
        $this->carrying = (float) $data['carrying'];
        $this->extra = $data['extra'];

        $this->validate();
    }

    private function validate(): void
    {
        if (empty($this->brand)) {
            throw new ValidateException('brand must be not empty; ');
        }

        if (empty($this->photoFileName)) {
            throw new ValidateException('photoFileName must be not empty; ');
        }

        if (empty($this->carrying)) {
            throw new ValidateException('carrying must be not empty; ');
        }

        if (empty(pathinfo($this->photoFileName, PATHINFO_EXTENSION))) {
            throw new ValidateException('Photo file must have extension');
        }

        // Добавить валидацию по допустимым расширениям
    }
}
