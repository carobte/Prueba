# Personal Expense Tracking Application

This is a web application developed with **Laravel** that allows users to record, manage, and view their personal expenses in a simple and efficient manner. The main goal of this application is to facilitate daily expense management by providing an easy-to-use interface to track personal finances in detail.

## Features

- **Expense Recording**: Users can record each expense with the following information:
  - **Description**: A brief description of the expense.
  - **Price**: The amount spent.
  - **Category**: The category the expense belongs to.
  - **Date**: The date the expense was made.
  
- **Expense Viewing**: The recorded expenses are displayed in a list sorted by date. Users can filter the expenses by category or date range.

- **Automatic Total Calculation**: The application shows the total accumulated expenses. It also displays category-wise totals, helping the user understand where they are spending the most.

- **Editing and Deleting Records**: Users can edit an existing expense. They also have the option to delete an expense, with a confirmation prompt to avoid accidental errors.

- **Validations**:
  - The price (amount) must be a positive number.
  - The description and category fields are mandatory.
  - The entered date must be valid.

## Project Requirements

- **PHP** 8.0 or higher.
- **Laravel** 9.x or higher.

## Installation

### 1. Clone the repository

- <code> git clone https://github.com/carobte/Prueba<br></code>
- <code> cd Prueba </code>

### 2. Install dependencies

- <code> npm install </code>

### 3. Compile assets

To compile CSS and JavaScript files, run:

- <code>npm run dev</code>

### 4. Configure the sqlite database
In the root directory:

- <code> touch database/database.sqlite </code>

Note: If you want to use other SQL databases, make sure to create and update your .env file and variables.

### 5. Run the migrations and seeders

- <code>php artisan migrate</code><br>
- <code>php artisan db:seed</code><br>

### 6. Start the development server

Run the following command to start the local server:

<code> composer run dev </code>

## Default README for Laravel projects

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

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
