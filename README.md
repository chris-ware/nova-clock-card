# Nova Clock Card
A clock card for Laravel Nova

 ## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require chris-ware/nova-clock-card
```

Next, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        new \ChrisWare\NovaClockCard\NovaClockCard,
    ];
}
```

 ## Information
 This card will pull in your set timezone from `config/app.php` and use it to display the date and time.