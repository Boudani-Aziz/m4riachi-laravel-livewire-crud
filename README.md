# Laravel Livewire Crud

A simple Laravel Livewire crud (create, read, update, delete) example with pagination, search, order and file upload. if can help any one, 

## Configuration
- php ^7.3 
- laravel ^7.24 (on the version 8 you must change the code in the ProductSeeder to work correctly)
- livewire ^1.3

## Installation

1. `git clone https://github.com/m4riachi/m4riachi-laravel-livewire-crud.git`
2. `cd m4riachi-laravel-livewire-crud`
3. `composer install`
4. `npm install`
5. `npm run dev`
6. `cp .env.example .env` (you have to change in .env file the DB connection param)
7. `php artisan key:generate`
8. `php artisan db:seed` (if you want to seed the table products with some fakes data)
9. `php artisan serve`
