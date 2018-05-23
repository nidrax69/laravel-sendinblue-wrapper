Sendinblue API w. support for Laravel
---

The package supports use with the [Laravel framework][1] v4.x or v5.x providing a `SendinblueWrapper` facade.

----

###Setup:

In order to install, add the following to your `composer.json` file within the `require` block:

```js
"require": {
    …
    "nidrax69/sendinblue": "0.0.2"
    …
}
```

Within Laravel, locate the file `..config/app.php`.
Add the following to the `providers` array:

```php
'providers' => array(
    …
    'Nidrax69\Sendinblue\SendinblueServiceProvider',
    …
),
```

Furthermore, add the following the the `aliases` array:

```php
'aliases' => array(
    …
    'SendinblueWrapper' => 'Nidrax69\Sendinblue\Facades\SendinBlueWrapper',
    …
),
```

Run the command `composer update`.

Publish the configuration:

```sh
// Laravel v4.x
$ php artisan config:publish vansteen/sendinblue

// Laravel v5.x
$ php artisan vendor:publish
```

----

###Usage:

Your unique Sendinblue API key should be set in the package's config found in `app/config/packages/vansteen/sendinblue/config.php` (Laravel 4)
`config/sendinblue.php` (Laravel 5)

Methods of the Sendinblue API class work as described by the Sendinblue API docs found [Here][2]. Thanks to Laravel's use of the "Facade" design pattern, all methods may be called in the following manner:

```php
…
// send template
$ml = new SendinblueWrapper();
$return = $ml->send_transactional_template($data);
…
```


[1]: http://laravel.com/
[2]: https://apidocs.sendinblue.com/
