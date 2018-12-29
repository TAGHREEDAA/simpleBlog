## Simple Blog
A simple blog system provides user interface to browse and
explore blog posts. 
Also it contains admin dashboard to add, edit, delete, and update
posts and categories.

### Prerequisites
You need to have laravel environment installed on your machine
ex: Laravel Homestead / apache server 
see: https://laravel.com/docs/5.7#server-requirements


### Installation

`git clone https://github.com/TAGHREEDAA/simpleBlog project`

`cd project`

`composer install`

`cp .env.example .env  #THEN EDIT YOUR ENV FILE ACCORDING TO YOUR OWN SETTINGS.`

`npm install`

`php artisan migrate --seed`

`npm run dev`

`php artisan serve`

#### Routes
`/admin` => Admin Dashboard

- email: `admin@mail.com`
- password: `secret` 

`/admin/categories`  => Get All Categories & CRUD Operations

`/admin/posts` => Get All Posts & CRUD Operations

#### Testing

`cd project`

`phpunit`