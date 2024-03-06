# Country Flags App

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

This project is a web application built with Laravel, Auth0, Vue, and Vite. It also includes Docker support for easy setup and development.

## About The Project

This project uses Laravel, a web application framework with expressive, elegant syntax. Laravel is accessible, powerful, and provides tools required for large, robust applications.

Auth0 is used for secure and reliable user authentication. It's easy to implement in Laravel and provides a wide range of authentication features.

The frontend of the application is built with Vue, a progressive JavaScript framework for building user interfaces. Vue is combined with Vite, a build tool that significantly improves frontend development experience.

## CountryService

This project includes a service called `CountryService`. This service is responsible for fetching country data from an external API, [https://restcountries.com](https://restcountries.com).

The `CountryService` is designed using the [Service Object pattern](https://martinfowler.com/eaaCatalog/serviceLayer.html). This pattern encapsulates the application's business logic, controls transactions, and coordinates responses. The main advantage of using this pattern is that it provides a clear separation of concerns. The `CountryService` is only responsible for fetching and handling country data.

This design also makes the `CountryService` easily replaceable. If you need to fetch country data from a different API or a database in the future, you can replace the `CountryService` with a new service that implements the same interface.

Here's an example of how you might use the `CountryService`:

```php
$countryService = new CountryService();
$countries = $countryService->fetchCountries();
```

## Docker Support

This project includes Docker support. Docker allows you to package the application with all its dependencies into a standardized unit for software development.

You can start the application with the following command:

```bash
docker-compose up --build
```
