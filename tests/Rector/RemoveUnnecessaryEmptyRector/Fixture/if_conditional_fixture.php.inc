<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public array $syncFields;

    public function doConditional(array $stuff): array
    {
        if (empty($this->syncFields) || !empty($stuff)) {
            return $stuff;
        }

        return [];
    }
}
?>
-----
<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public array $syncFields;

    public function doConditional(array $stuff): array
    {
        if (!$this->syncFields || $stuff) {
            return $stuff;
        }

        return [];
    }
}
?>
