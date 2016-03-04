# mscharl/pretty-error-page
[![Total Downloads](https://img.shields.io/packagist/dm/mscharl/pretty-error-page.svg)](https://packagist.org/packages/mscharl/pretty-error-page) [![Latest Version](http://img.shields.io/packagist/v/mscharl/pretty-error-page.svg)](https://packagist.org/packages/mscharl/pretty-error-page)

-----

This package provides nice looking, customizable and localizable error pages, with two predefined views for Laravel.

By default pretty error pages are displayed when debug-mode is disabled and the requests does not expects a JSON-response.

## Install
This version (1.*) is compatible with Laravel 4.2
```sh
composer require mscharl/pretty-error-page:1.*
```

Add the service provider `'Mscharl\PrettyErrorPage\PrettyErrorPageServiceProvider'` to your `app.php` providers array.

Publish public assets
```sh
php artisan asset:publish --path=vendor/mscharl/pretty-error-page/public mscharl/pretty-error-page
```

-----

## Customize
You can easily customize the output of this package by following those steps

### Configuration
```sh
php artisan config:publish mscharl/pretty-error-page
```

##### Config values
* always_pretty `bool|null`
  * `null` (default) use pretty error page only when debug mode is off
  * `true` always show pretty error page (except when expecting a JSON-Response)
  * `false` never show pretty error page

### Translations
Unfortunalty publishing lang-files like config- or view-files is not supported by default.
But you still can customize the translation since they are the easiest way to customize a general or specific error output. You do not need to edit anything inside the views. Translations are automatically loaded by the thrown http-status-code.

Translation will be lokked up by the package in the following order:
```
customized::404.title > customized::general.title > predefined::404.title > predefined::general.title
```

##### Customize specific error code translations
Create a `[errorcode].php` file into `app/lang/packages/mscharl/pretty-error-page/[langcode]`.

##### Customize fallback translations
Create a `generic.php` file into `app/lang/packages/mscharl/pretty-error-page/[langcode]`.

##### Required translation keys
```php
<?php

return [
    'title' => 'Whoops!',
    'header_title' => 'Whoops! Something went wrong.',
    'description' => 'Something went wrong.',

    'submit_bug' => 'If this problem presits, pleace contact our <a href=":link">Support-Team</a>',
];
```

-----

### Views
```sh
php artisan asset:publish mscharl/pretty-error-page
```

You can either override the predefined tempaltes or just add custom error pages for specific error codes.

##### layouts
* `mail.blade.php`: This file is used to render the email body that can be sent by the user getting the error to inform you about the incidence.
* `default.blade.php`: This file is used to define a general layout for the error pages. Every error template should extend this layout for simplicity.

##### mail
* shared variables:
  * `$message`: The error message
  * `$exception`: The full PHP-Exception
    
* `partials/log.blade.php`: This file defines the log that can be sent to you by mail. The log is automatically included into every mail by the mail layout.
* `[langcode].blade.php`: The E-Mail body for the language with this language code

##### pages
The error pages. There is a simple naming system.
If an error page is displayed the specific error code is used as the primary filename e.g. `503`. If this is not found `5xx` will be used. If this is still not found `any` will be used as fallback.

* `404.blade.php`: The predefined 404-Error-Page
* `503.blade.php`: The predefined 503-Error-Page
* `any.blade.php`: The fallback error page if no specific page is found

-----

## How does it look like?

#### 404
![404 Template](https://cdn.rawgit.com/mscharl/pretty-error-page/master/preview-404.png)

#### Generic
![Generic Template](https://cdn.rawgit.com/mscharl/pretty-error-page/master/preview-any.png)

