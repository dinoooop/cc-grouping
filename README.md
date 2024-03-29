# CC Grouping

Laravel application that fetches data from external APIs for cities and countries, allows users to create groups of cities and countries, and provides an API to retrieve the grouped data.

## Installation
PHP 8.1 and Laravel 10 or higher are required.

First of all, install all composer files
```sh
composer install
```

## Database Configuration
To configure your Laravel application to connect to the database, update the following settings in `.env` file.

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_cc_grouping
DB_USERNAME=root
DB_PASSWORD=
```

After setting database run the following command to create all required table for the application 
```sh
php artisan migrate
```

There is two API for countries and cities, the command will fetch required data and store in the database.
```sh
php artisan db:seed
```

To ensure the security of the application you have to run the following command to generate a key.
```sh
php artisan key:generate
```

## Test User Account

The seed command will also create a test user account for your convenience. You can use the following email address to access the test account:

**Test User Email:** `admin@mail.com`
**Test User password:** `welcome`

Feel free to explore the application and use this test user account for testing purposes.

## Here is your Group API

To make an AJAX request to your group API endpoint, you can use the following JavaScript code:

```javascript
$.ajax({
    url: '/api/groups',
    type: 'GET',
    headers: {
        'Authorization': 'Bearer ' + YOUR_ACCESS_TOKEN
    },
    success: function (response) {
        console.log(response);
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});
```

### Note
For individual group access use group id in url parameter as `/api/groups/{id}`
