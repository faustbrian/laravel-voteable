# Laravel Voteable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-voteable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    DraperStudio\Voteable\ServiceProvider::class
];
```

At last you need to publish and run the migration.

```
php artisan vendor:publish --provider="DraperStudio\Voteable\ServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php

/*
 * This file is part of Laravel Voteable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use DraperStudio\Voteable\Contracts\Voteable;
use DraperStudio\Voteable\Traits\Voteable as VoteableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Voteable
{
    use VoteableTrait;
}

```

### Sum of all votes
``` php
Vote::sum($user);
```

### Count all votes
``` php
Vote::count($user);
```

### Count all up-votes
``` php
Vote::countUps($user);
```

### Count all down-votes
``` php
Vote::countDowns($user);
```

### Count all votes between two dates
``` php
Vote::countByDate($user, '2015-06-30', '2015-06-31');
```

### Up-vote
``` php
Vote::up($user);
```

### Down-vote
``` php
Vote::down($user);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-voteable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Voteable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-voteable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-voteable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-voteable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-voteable
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Voteable
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-voteable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-voteable
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-voteable
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
