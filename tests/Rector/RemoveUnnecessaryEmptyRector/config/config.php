<?php

declare(strict_types=1);

use Ostrolucky\RectorRules\RemoveUnnecessaryEmptyRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()->withRules([RemoveUnnecessaryEmptyRector::class]);
