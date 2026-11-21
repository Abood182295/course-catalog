# Course Catalog (Laravel)

A small Laravel course catalog. Visitors can browse all courses and open a page for each course that shows its instructor.

- `GET /courses` – list of all courses
- `GET /courses/{id}` – details of one course (including the instructor's name)

## Requirements

- PHP 8.2 or newer (with the `pdo_sqlite` extension)
- Composer

## Setup commands

```bash
# 1. Get the project and install dependencies
git clone <repository-link> course-catalog
cd course-catalog
composer install

# 2. Create your local environment file and app key
cp .env.example .env
php artisan key:generate

# 3. Create the SQLite database file, run migrations and seed the data
touch database/database.sqlite
php artisan migrate --seed

# 4. Start the development server
php artisan serve
```

Then open <http://127.0.0.1:8000/courses>.

To reset the data at any time: `php artisan migrate:fresh --seed`

> On Windows (PowerShell) use `New-Item database/database.sqlite` instead of `touch`, and `copy .env.example .env` instead of `cp`.

## Secrets

No secrets are committed to the repository. The `.env` file (which holds `APP_KEY` and database settings) is listed in `.gitignore`; only `.env.example` with safe placeholder values is committed. The `vendor/` folder is also ignored and is recreated by `composer install`.

## What is in the project

| Area | File(s) |
| --- | --- |
| Routes | `routes/web.php` |
| Controller (created with `php artisan make:controller CourseController`) | `app/Http/Controllers/CourseController.php` |
| Blade layout | `resources/views/layouts/app.blade.php` |
| Reusable Blade component (course card) | `resources/views/components/course-card.blade.php` |
| Pages | `resources/views/courses/index.blade.php`, `resources/views/courses/show.blade.php` |
| Migrations (instructors, courses with a foreign key) | `database/migrations/` |
| Models and relationships (`Instructor` hasMany `Course`, `Course` belongsTo `Instructor`) | `app/Models/` |
| Seeder (3 instructors, 10 courses) | `database/seeders/DatabaseSeeder.php` |

## Laravel request lifecycle

When a browser requests a URL such as `/courses/3`, the request first reaches `public/index.php`, which is the single entry point of the application. That file loads Composer's autoloader and boots the framework (`bootstrap/app.php`), which creates the application and its service container and registers the service providers. The request is then handed to the HTTP kernel, which passes it through the global middleware (for example, handling sessions and cookies). The router then compares the URL with the routes defined in `routes/web.php`; here it matches `/courses/{id}` and calls the `show` method of `CourseController`, passing `3` as the `$id` parameter. The controller asks the `Course` Eloquent model to fetch the row (and its instructor) from the database, and returns a Blade view with that data. Blade compiles the template, which extends the main layout and uses the course-card component, into plain PHP and then HTML. Finally, the response travels back out through the middleware and is sent to the browser.

## AI-use statement

I used **Claude (by Anthropic)** as an AI assistant in this assignment. It was used to generate the first version of the code: the routes, `CourseController`, the `Instructor` and `Course` models, the migrations, the seeder, the Blade layout, the course-card component and the page views. It was also used to draft this README, including the lifecycle paragraph. I reviewed the code, ran it, and made sure I understand how each part works. No other AI tools were used.
