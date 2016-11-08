# Laravel Voteable

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-voteable
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    BrianFaust\Voteable\VoteableServiceProvider::class
];
```

To get started, you'll need to publish the vendor assets and migrate:

```
php artisan vendor:publish --provider="BrianFaust\Voteable\ServiceProvider" && php artisan migrate
```

## Usage

### Setup a Model
``` php
<?php

namespace App;

use BrianFaust\Voteable\HasVotesTrait;
use BrianFaust\Voteable\Interfaces\HasVotes;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements HasVotes
{
    use HasVotesTrait;
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

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

The [The MIT License (MIT)](LICENSE). Please check the [LICENSE](LICENSE) file for more details.
