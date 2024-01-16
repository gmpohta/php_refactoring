<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use App\Refactor\Parser\ParserService;

$parser = new ParserService();

print_r($parser('test.csv'));
