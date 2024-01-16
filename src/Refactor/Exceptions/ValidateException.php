<?php

declare(strict_types=1);

namespace App\Refactor\Exceptions;

final class ValidateException extends \Exception
{
    public function __construct(string $message = '')
    {
        parent::__construct($message);
    }
}
