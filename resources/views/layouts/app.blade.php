<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Course Catalog') | {{ config('app.name') }}</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, sans-serif; background: #f4f6f8; color: #1f2937; }
        header { background: #1e3a8a; color: #fff; padding: 1rem 2rem; }
        header a { color: #fff; text-decoration: none; font-weight: 600; font-size: 1.25rem; }
        main { max-width: 960px; margin: 2rem auto; padding: 0 1rem; }
        footer { text-align: center; color: #6b7280; padding: 2rem 0; font-size: .875rem; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1rem; }
        .card { background: #fff; border-radius: 8px; padding: 1.25rem; box-shadow: 0 1px 3px rgba(0,0,0,.1); }
        .card h3 { margin-top: 0; }
        .badge { display: inline-block; padding: .15rem .6rem; border-radius: 999px; font-size: .75rem; background: #e5e7eb; }
        .badge.featured { background: #fde68a; }
        .muted { color: #6b7280; }
        a.btn { display: inline-block; margin-top: .5rem; color: #1e3a8a; font-weight: 600; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('courses.index') }}">{{ config('app.name') }} &mdash; Course Catalog</a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>&copy; {{ date('Y') }} Course Catalog</footer>
</body>
</html>
