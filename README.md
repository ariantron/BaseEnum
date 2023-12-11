# Base Enum

The **Base Enum** Composer package provides a versatile superclass for creating Enum classes in PHP with enhanced functionalities. Enums are a powerful way to represent a fixed set of named values in your code, and this package simplifies their implementation and usage.

## Installation

To install the Base Enum package, use the following Composer command:

```bash
composer require ariantron/base-enum
```

## Usage

### Creating Enum Classes

To create an Enum class using the Base Enum package, extend the `BaseEnum` class and define your constants within the class. Here's an example:

```php
<?php

namespace App\Enums;

use ArianTron\BaseEnum\BaseEnum;

class MyEnum extends BaseEnum
{
    const VALUE_ONE = 'one';
    const VALUE_TWO = 'two';
    const VALUE_THREE = 'three';
}
```

### Enum Class Methods

#### `isValidName($name, $strict = false): bool`

Check if the given `$name` is a valid constant name within the Enum. By default, the check is case-insensitive, but you can set `$strict` to `true` for a case-sensitive check.

#### `getConstants(): array`

Retrieve an array of all constants defined in the Enum class.

#### `isValidValue($value, $strict = true): bool`

Check if the given `$value` is a valid constant value within the Enum. By default, the check is strict (both value and type), but you can set `$strict` to `false` for a loose check.

#### `toString($val): int|string`

Convert the Enum constant value back to its corresponding constant name.

## Example Usage

```php
// Check if a name is a valid constant in the Enum
$result = MyEnum::isValidName('VALUE_TWO'); // true

// Get all constants in the Enum
$constants = MyEnum::getConstants(); // ['VALUE_ONE' => 'one', 'VALUE_TWO' => 'two', 'VALUE_THREE' => 'three']

// Check if a value is a valid constant value in the Enum
$result = MyEnum::isValidValue('two'); // true

// Convert a constant value back to its name
$name = MyEnum::toString('two'); // 'VALUE_TWO'
```

## Contribution

Feel free to contribute to the development of this package by submitting issues or pull requests on the [GitHub repository](https://github.com/ariantron/base-enum).

## License

This package is open-source and available under the [MIT License](LICENSE). Feel free to use, modify, and distribute it according to the terms of the license.