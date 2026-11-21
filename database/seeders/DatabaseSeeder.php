<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Creates 3 instructors and 10 courses.
     * Run with: php artisan migrate --seed   (or php artisan db:seed)
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dr. Sara Al-Harbi',
                'email' => 'sara.alharbi@example.com',
                'bio' => 'Software engineering lecturer focused on web development.',
                'courses' => [
                    ['Introduction to PHP', 'Variables, functions, arrays and forms in modern PHP.', 'Beginner', 6, true],
                    ['Laravel Fundamentals', 'Routing, controllers, Blade and Eloquent from scratch.', 'Intermediate', 8, true],
                    ['Building REST APIs', 'Design and build JSON APIs with validation and resources.', 'Advanced', 6, false],
                    ['Testing with PHPUnit', 'Write feature and unit tests for web applications.', 'Intermediate', 4, false],
                ],
            ],
            [
                'name' => 'Mr. Khalid Al-Otaibi',
                'email' => 'khalid.alotaibi@example.com',
                'bio' => 'Database specialist with ten years of industry experience.',
                'courses' => [
                    ['Database Design', 'Entity-relationship modelling and normalisation.', 'Beginner', 5, false],
                    ['SQL in Practice', 'Joins, aggregates and query optimisation.', 'Intermediate', 6, true],
                    ['Data Migrations & Seeding', 'Version your schema and manage test data safely.', 'Intermediate', 3, false],
                ],
            ],
            [
                'name' => 'Ms. Noura Al-Qahtani',
                'email' => 'noura.alqahtani@example.com',
                'bio' => 'Front-end developer and UI/UX instructor.',
                'courses' => [
                    ['HTML & CSS Essentials', 'Semantic markup, flexbox and responsive layouts.', 'Beginner', 4, false],
                    ['JavaScript Basics', 'Core language features and DOM manipulation.', 'Beginner', 6, true],
                    ['Blade & Front-end Integration', 'Reusable layouts and components in Laravel views.', 'Intermediate', 3, false],
                ],
            ],
        ];

        foreach ($data as $row) {
            $instructor = Instructor::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'bio' => $row['bio'],
            ]);

            foreach ($row['courses'] as [$title, $description, $level, $weeks, $featured]) {
                // Uses the hasMany relationship, so instructor_id is filled in automatically.
                $instructor->courses()->create([
                    'title' => $title,
                    'description' => $description,
                    'level' => $level,
                    'duration_weeks' => $weeks,
                    'is_featured' => $featured,
                ]);
            }
        }
    }
}
