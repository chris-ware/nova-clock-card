# Nova Clock Card
A clock card for Laravel Nova

[![Latest Stable Version](https://badgen.net/packagist/v/chris-ware/nova-clock-card)](https://packagist.org/packages/chris-ware/nova-clock-card)
[![Total Downloads](https://badgen.net/packagist/dt/chris-ware/nova-clock-card)](ttps://packagist.org/packages/chris-ware/nova-clock-card)
[![License](https://badgen.net/packagist/license/chris-ware/nova-clock-card)](ttps://packagist.org/packages/chris-ware/nova-clock-card)
[![StyleCI](https://github.styleci.io/repos/146102919/shield?branch=master)](https://github.styleci.io/repos/146102919)

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

 ## Customization
 You are able to customize date & time formats, locale and timezone and display type. By default locale and timezone is taken from `config/app.php`. The default display type is `text`. The `analogue` display type is also available.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        (new \ChrisWare\NovaClockCard\NovaClockCard)
            ->locale('sk')
            ->dateFormat('dddd, Do MMMM YYYY')
            ->timeFormat('LTS')
            ->timezone('UTC')
            ->display('analogue'),
    ];
}
```

 ## Information
 This card will pull in your set timezone from `config/app.php` and use it to display the date and time.
