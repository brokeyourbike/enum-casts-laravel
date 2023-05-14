# enum-casts-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/enum-casts-laravel)](https://github.com/brokeyourbike/enum-casts-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/enum-casts-laravel/downloads)](https://packagist.org/packages/brokeyourbike/enum-casts-laravel)
[![Maintainability](https://api.codeclimate.com/v1/badges/590b94c7d61715715340/maintainability)](https://codeclimate.com/github/brokeyourbike/enum-casts-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/590b94c7d61715715340/test_coverage)](https://codeclimate.com/github/brokeyourbike/enum-casts-laravel/test_coverage)

Cast attributes to [Enum](https://github.com/myclabs/php-enum)

## Installation

```bash
composer require brokeyourbike/enum-casts-laravel
```

## Usage

```php
use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\EnumCasts\EnumCast;
use BrokeYourBike\EnumCasts\NullableEnumCast;

class Order extends Model
{
    protected $casts = [
        'state' => EnumCast::class . ':' . StateEnum::class,
        'state_nullable' => NullableEnumCast::class . ':' . StateEnum::class,
    ];
}
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/enum-casts-laravel/blob/main/LICENSE)
