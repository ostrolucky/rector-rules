<h1 align="center">ostrolucky/rector-rules</h1>

<p align="center">
    <strong>Provides rector php rules for making the code more concise</strong>
</p>

<!--
TODO: Make sure the following URLs are correct and working for your project.
      Then, remove these comments to display the badges, giving users a quick
      overview of your package.

<p align="center">
    <a href="https://github.com/ostrolucky/concise-rectors"><img src="https://img.shields.io/badge/source-ostrolucky/concise--rectors-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/ostrolucky/concise-rectors"><img src="https://img.shields.io/packagist/v/ostrolucky/concise-rectors.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/ostrolucky/concise-rectors.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/ostrolucky/concise-rectors/blob/main/LICENSE"><img src="https://img.shields.io/packagist/l/ostrolucky/concise-rectors.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/ostrolucky/concise-rectors/actions/workflows/continuous-integration.yml"><img src="https://img.shields.io/github/actions/workflow/status/ostrolucky/concise-rectors/continuous-integration.yml?branch=main&style=flat-square&logo=github" alt="Build Status"></a>
    <a href="https://codecov.io/gh/ostrolucky/concise-rectors"><img src="https://img.shields.io/codecov/c/gh/ostrolucky/concise-rectors?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/ostrolucky/concise-rectors"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Fostrolucky%2Fconcise-rectors%2Fcoverage" alt="Psalm Type Coverage"></a>
</p>
-->


## Usage

### Rules

This project provides the following rules for [`rector/rector`](https://github.com/rectorphp/rector):

#### RemoveUnnecessaryEmptyRector
```diff
function run(array $foos, array $bars): bool
{
-    if (!empty($foos)) {
+    if ($foos) {
      return $foos;
    }

-    return !empty($bars);
+    return (bool) $bars;
}
```


## Installation

Install this package as a dependency using [Composer](https://getcomposer.org).

``` bash
composer require --dev ostrolucky/rector-rules
```

<!--
## Usage

Provide a brief description or short example of how to use this library.
If you need to provide more detailed examples, use the `docs/` directory
and provide a link here to the documentation.

``` php
use Ostrolucky\RectorRules\Example;

$example = new Example();
echo $example->greet('fellow human');
```
-->


## Contributing

Contributions are welcome! To contribute, please familiarize yourself with
[CONTRIBUTING.md](CONTRIBUTING.md).
