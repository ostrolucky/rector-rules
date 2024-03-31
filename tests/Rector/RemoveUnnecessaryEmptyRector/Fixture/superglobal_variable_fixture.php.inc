<?php
namespace Ostrolucky\Test\RectorRules\Rector\RemoveUnnecessaryEmptyRector\Fixture;

class SomeClass
{
    public function hasThing(): bool
    {
        return !empty($_SESSION) && !empty($GLOBALS) && !empty($_GET) && !empty($_POST) && !empty($_FILES) && !empty($_COOKIE) && !empty($_REQUEST) && !empty($_ENV);
    }
}
