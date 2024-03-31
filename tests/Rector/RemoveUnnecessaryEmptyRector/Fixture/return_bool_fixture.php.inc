<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public array $syncFields;

    function has(): bool
    {
        return !empty($this->syncFields);
    }

    function hasNot(): bool
    {
        return empty($this->syncFields);
    }
}
?>
-----
<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public array $syncFields;

    function has(): bool
    {
        return (bool) $this->syncFields;
    }

    function hasNot(): bool
    {
        return !$this->syncFields;
    }
}
?>
