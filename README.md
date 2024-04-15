<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Note : You can find the Frontend of the project in this link https://github.com/khemrajregmi/NuxtFilterTable , if you feel it helps you please press the star button at the top

## Steps to run the project

1. `git clone git@github.com:khemrajregmi/laravelMongoDb.git` if you are using ssh clone else with HTTPS `git clone https://github.com/khemrajregmi/laravelMongoDb.git`

2. `cd into the <project name>`

3. `Copy .env.example to .env`

4. Run ` composer install` in terminal

5. Run `php artisan key:generate`
   
7. Run `Docker compose up --build`

## Run Migartions and Seeders inside the docker container 
    1. click container name called test-api 


![images](Screenshots/Screenshot%202024-04-03%20at%2018.03.02.png)
    2. Click on the terminal tab and run the following commands
![images](Screenshots/Screenshot%202024-04-03%20at%2018.15.45.png)

    Run `php artisan migrate`

    Run `php artisan config:publish cors`

    Run `php artisan db:seed --class = CustomerSeeder`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
