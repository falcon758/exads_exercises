# Exads Exercises

## Installation & updates

`composer create-project falcon758/exads_exercises` then `composer update`

## Setup

Copy `.env.example` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

### Database

Generate database tables and seed following this steps:

1. From the projects root folder run `php artisan migrate`
2. From the projects root folder run `php artisan db:seed`

## Unit Tests

Run unit test of this project using this command on root folder:

`./vendor/bin/phpunit --verbose tests`

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
