# Laravel Serializer

## Installation

Require the `niburkin/serializer` in your `composer.json` and update your dependencies:
```sh
composer require niburkin/serializer
```

For laravel >=5.5 that's all. This package supports Laravel new [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

If you are using Laravel < 5.5, you also need to add Serializer\Providers\SerializerServiceProvider to your `config/app.php` providers array:
```php
NiBurkin\Serializer\Providers\SerializerServiceProvider::class,
```

## Configuration

all objects must be entered into the list object in the config file (`config/serializer.php`).
Copy this file to your own config directory to modify the values. 
You can publish the config using this command:
```sh
php artisan vendor:publish --provider="NiBurkin\Serializer\Providers\SerializerServiceProvider"
```

## Using

How to create serializer from command line:

```sh
php artisan make:serializer ClassName
```

Options:
* `--o` or `--object` - auto create serializer for you class in project app.


## License

Released under the MIT License, see [LICENSE](LICENSE).