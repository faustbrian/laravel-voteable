# Laravel Voteable

[![Build Status](https://img.shields.io/travis/artisanry/Voteable/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Voteable)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/voteable.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Voteable.svg?style=flat-square)](https://github.com/artisanry/Voteable/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Voteable.svg?style=flat-square)](https://packagist.org/packages/artisanry/Voteable)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/voteable
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="Artisanry\Voteable\VoteableServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php

namespace App;

use Artisanry\Voteable\HasVotes;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasVotes;
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

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
