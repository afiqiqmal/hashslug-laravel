# laravel-hashslug
HashSlug Id for laravel


## Installation

> **NOTE**: Depending on your version of Laravel, you should install a different
> version of the package:
> 
> | Laravel Version |      Package Version      |
> |:---------------:|:-------------------------:|
> |       5.5 ^     |  1.2.* , dev-master       |
> |       5.4       |  1.0.* , dev-laravel-5.4  |
>


1. Install the package via Composer:

    ```sh
    $ composer require afiqiqmal/hashslug-laravel
    ```

    The package will automatically register itself with Laravel 5.5.
    
    ```php
   ...
   Afiqiqmal\LaraHashSlug\LaraHashSlugProvider::class,
   ...
    ```

2. Optionally, publish the configuration file if you want to change any defaults:

    ```sh
    php artisan vendor:publish --provider="Afiqiqmal\LaraHashSlug\LaraHashSlugProvider"
    ```


## Usage

use `UseHashSlug` Trait class in any model you need

```php
class User extends Model {
   use UseHashSlug;
   
   //optional. default : "hashslug". 
   protected $hash_column = "hash_column";
}
```


## Configuration

Default `hashslug.php`. publish provider if you want to change any defaults

```php
return [
    'salt'     => env('HASHID_SALT', 'lara-hash-slug'),
    'length'   => env('HASHID_LENGTH', 12),
    'alphabet' => env('HASHID_ALPHABET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
    'unique'   => env('HASHID_UNIQUE', true),
];

```