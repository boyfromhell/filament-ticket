# This is a ticket system for filament admin panel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ichbin/filament-ticket.svg?style=flat-square)](https://packagist.org/packages/ichbin/filament-ticket)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ichbin/filament-ticket/run-tests?label=tests)](https://github.com/ichbin/filament-ticket/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ichbin/filament-ticket/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/ichbin/filament-ticket/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ichbin/filament-ticket.svg?style=flat-square)](https://packagist.org/packages/ichbin/filament-ticket)

This is a ticket system for filament admin panel

## Installation

You can install the package via composer:

```bash
composer require ichbin/filament-ticket
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-ticket-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-ticket-config"
```

This is the contents of the published config file:

```php
return [
    'resources' => [
        TicketResource::class,
        CategoryResource::class,
        StatusResource::class,
        PriorityResource::class,
    ],
    'models' => [
        \App\Models\User::class,
    ],
    "navigation_group" => "Ticket System",
    "ticket_label" => "Custom Fields",
    "ticket_responses_label" => "Custom Fields Responses",
    "category_label" => "Custom Fields",
    "category_responses_label" => "Custom Fields Responses",
    "status_label" => "Custom Fields",
    "status_responses_label" => "Custom Fields Responses",
    "priority_label" => "Custom Fields",
    "priority_responses_label" => "Custom Fields Responses",
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-ticket-views"
```

## Usage

## Testing

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [IchBin](https://github.com/IchBin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
