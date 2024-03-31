<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public array $syncFields;

    public function hasThing(string $thing): bool
    {
        return !empty($this->syncFields[$thing]);
    }
}
