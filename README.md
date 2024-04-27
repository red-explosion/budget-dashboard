<p align="center">
    <img src="./.github/header.png" width="1280" alt="Budget Dashboard">
</p>

> [!WARNING]  
> This product is actively being developed and a stable version hasn't yet been released.

## Introduction

Budget Dashboard is a simple personal/household budgeting system built with privacy in mind. Budget dashboard allows
you to keep track of your income and monthly expenses. 

Budget Dashboard is a regular Laravel application built using Laravel 11, Filament and Tailwind CSS. If you are
comfortable with Laravel then you should have no problem running or even contributing to Budget Dashboard.

## Installation

In order to run Budget Dashboard, you will need PHP 8.3, a database server (there is absolutely no problem with using
SQLite) and Node.js 16 or later.

Once you have these installed, you should clone the repository:

```shell
git clone https://github.com/red-explosion/budget-dashboard.git

cd budget-dashboard
```

Next, install the [Composer](https://getcomposer.org/) and [NPM](https://www.npmjs.com/) dependencies:

```shell
composer install

npm install
```

You will then need to copy the example environment file and generate an application secret:

```shell
cp .env.example .env

php artisan key:generate
```

Be sure to also configure any other environment variables such as your database credentials.

Next run the migrations:

```shell
php artisan migrate
```

Finally, build the frontend assets by running the following:

```shell
nom run build
```

Depending on your server, you will also need to configure Nginx or Apache to point to this new site.
