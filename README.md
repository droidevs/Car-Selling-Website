# Car Selling Website

This is a web application built with the Laravel framework that serves as a platform for users to buy and sell cars.

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Routes](#routes)
- [Contributing](#contributing)
- [License](#license)

## Features

*   User authentication (signup and login)
*   RESTful resource for managing car listings (Create, Read, Update, Delete)
*   Search functionality for cars
*   A watchlist for users to save cars they are interested in
*   View cars available in different cities
*   A simple "About Us" page

## Tech Stack

*   **Backend:** PHP / Laravel
*   **Frontend:** Blade templates (likely with CSS and JavaScript)
*   **Dependency Management:** Composer (PHP), NPM (JavaScript)

## Installation

To get this project running on your local machine, follow these steps:

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    cd Car-Selling-Website
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies:**
    ```bash
    npm install
    ```

4.  **Create and configure your environment file:**
    -   Copy the `.env.example` file to a new file named `.env`.
    -   Update the database credentials (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) in your `.env` file.

5.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

6.  **Run database migrations** (this will create the necessary tables):
    ```bash
    php artisan migrate
    ```

7.  **Start the development server:**
    ```bash
    php artisan serve
    ```

The application should now be running on `http://127.0.0.1:8000`.

## Usage

Once the application is running, you can navigate to the home page. From there you can:
- Sign up for a new account.
- Log in to an existing account.
- Browse car listings.
- Use the search bar to find specific cars.
- Add cars to your personal watchlist.

## Routes

The main application routes are defined in `routes/web.php` and include:

| Method    | URI                  | Name              | Action                               |
|-----------|----------------------|-------------------|--------------------------------------|
| GET\|HEAD | `/`                  | `home`            | `HomeController@index`               |
| GET\|HEAD | `/about-us`          | `about`           | View                                 |
| GET\|HEAD | `/signup`            | `signup`          | `SignupController@create`            |
| GET\|HEAD | `/login`             | `login`           | `LoginController@create`             |
| GET\|HEAD | `/car/search`        | `car.search`      | `CarController@search`               |
| GET\|HEAD | `/car/watchlist`     | `car.watchlist`   | `CarController@watchlist`            |
| GET\|HEAD | `/car`               | `car.index`       | `CarController@index`                |
| POST      | `/car`               | `car.store`       | `CarController@store`                |
| GET\|HEAD | `/car/create`        | `car.create`      | `CarController@create`               |
| GET\|HEAD | `/car/{car}`         | `car.show`        | `CarController@show`                 |
| PUT\|PATCH| `/car/{car}`         | `car.update`      | `CarController@update`               |
| DELETE    | `/car/{car}`         | `car.destroy`     | `CarController@destroy`              |
| GET\|HEAD | `/car/{car}/edit`    | `car.edit`        | `CarController@edit`                 |
| GET\|HEAD | `/cities`            |                   | `CityController@index`               |

## Contributing

Contributions are welcome! Please feel free to open an issue or submit a pull request.

## License

This project is open-source.
