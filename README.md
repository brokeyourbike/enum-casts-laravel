# enums-casts-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/enums-casts-laravel)](https://github.com/brokeyourbike/enums-casts-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/enums-casts-laravel/downloads)](https://packagist.org/packages/brokeyourbike/enums-casts-laravel)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/enums-casts-laravel/blob/main/LICENSE)

[![Maintainability](https://api.codeclimate.com/v1/badges/38fd727cef212bf6953a/maintainability)](https://codeclimate.com/github/brokeyourbike/enums-casts-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/38fd727cef212bf6953a/test_coverage)](https://codeclimate.com/github/brokeyourbike/enums-casts-laravel/test_coverage)
[![tests](https://github.com/brokeyourbike/enums-casts-laravel/actions/workflows/tests.yml/badge.svg)](https://github.com/brokeyourbike/enums-casts-laravel/actions/workflows/tests.yml)

Cast attributes to [Enum](https://github.com/myclabs/php-enum)

## Installation

```bash
composer require brokeyourbike/enums-casts-laravel
```

## Usage

```php
use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\EnumsCasts\EnumCast;
use BrokeYourBike\EnumsCasts\NullableEnumCast;

class Order extends Model
{
    protected $casts = [
        'state' => EnumCast::class . ':' . StateEnum::class,
        'state_nullable' => NullableEnumCast::class . ':' . StateEnum::class,
    ];
}
```

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/enums-casts-laravel/blob/main/LICENSE)
