## Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-contact
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    ```php
    JeroenNoten\LaravelContact\ServiceProvider::class,
    ```
    
3. Publish the configuration:

    ```
    php artisan vendor:publish --tag=contact-config
    ```
