## UserAPI

This is a sample project I used to demostrate how to mock and test PHP Traits. The blog post can be found [here](http://stephenjude.tech/articles/mocking-and-testing-php-traits-in-a-laravel-application)

## Usage

Clone the repostory.

Run composer install
```bash
composer install
```

Create a `.env` file from `.env.example` 

Generate your app key
```bash
php artisan key:generate
```

Create a database and update your `.env` database credentials. 

Run the test

```bash
vendor/bin/phpunit --filter=CustomResponseTest
```