# Laravel Session Persistent Data Handler for Facebook SDK for PHP

## Installation

```
$ composer require martinbean/laravel-facebook-data-handler
```

## Usage

### Prerequisites

You need to specify your Facebook app ID and secret to use the SDK.

First, add the following to your **.env** file:

```
FACEBOOK_CLIENT_ID=your-client-id
FACEBOOK_CLIENT_SECRET=your-client-secret
```

Then, add the following section to your **config/services.php** file:

```php
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
],
```

### Using the SDK

The Facebook SDK and persistent data handler are wrapped up in a service
provider that you can drop in to your Laravel 5 applications. Simply add the
following to the `providers` array in your **config/app.php** file:

```
MartinBean\Facebook\Providers\FacebookServiceProvider::class,
```

Now, whenever you type-hint `Facebook\Facebook` in your application, you’ll get
the Facebook SDK pre-configured with your app ID, secret, and the persistent
data handler contained in this package.

For example:

```php
<?php

namespace App\Http\Controllers;

use Facebook\Facebook;

class FacebookLoginController extends Controller
{
    protected $facebook;

    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }
}
```

## License

Licensed under the [MIT License][1].

## Issues

Please open a [GitHub Issue][2].

[1]: LICENSE
[2]: https://github.com/martinbean/laravel-facebook-data-handler/issues/new
