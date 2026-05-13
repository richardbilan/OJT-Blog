<?php

use Illuminate\Support\Facades\Route;

$students = [
    [
        'slug' => 'Chad',
        'name' => 'Richard  D.  Bilan  Jr.',
        'track' => 'FullStack Developer',
        'image' => 'images/Students/Richard Bilan.jpg',
    ],
    [
        'slug' => 'Zaro',
        'name' => 'Lord Zaro Fiber A. Quintanilla',
        'track' => 'FullStack Developer',
        'image' => 'images/Students/Zaro Quintanilla.jpg',
        'has_pages' => false,
    ],
    [
        'slug' => 'Wendee',
        'name' => 'Wendee Diane F. Llona',
        'track' => 'FullStack Developer',
        'image' => 'images/Students/wendee Llona.jpg',
        'has_pages' => false,
    ],
    [
        'slug' => 'Karl',
        'name' => 'Karl Christian O. Carlos',
        'track' => 'Quality Assurance',
        'image' => 'images/Students/Karl Carlos.jpg',
        'has_pages' => false,
    ],
    [
        'slug' => 'Val',
        'name' => 'Valerie Joyce R. Soreda',
        'track' => 'Quality Assurance',
        'image' => 'images/Students/val.jpg',
        'has_pages' => false,
    ],
    [
        'slug' => 'Maam Jane',
        'name' => 'Jane Burce',
        'track' => 'Mentor',
        'image' => 'images/Senior Devs,Mentors/BurceMaryJaneB.jpg',
    ],
    [
         'slug' => 'Sir John',
        'name' => 'John C. Ortilla',
        'track' => 'Senior Developer',
        'image' => 'images/Senior Devs,Mentors/OtillaJohnC.jpg',
    ],
    [
        'slug' => 'Sir Jes',
        'name' => 'Jestoni Vargas',
        'track' => 'Senior Developer',
        'image' => 'images/Senior Devs,Mentors/VargasJestoniU.png',
    ],
];

Route::get('/', function () use ($students) {
    return view('pages.home', [
        'students' => $students,
    ]);
})->name('home');

// --------------------------------- STUDENT ROUTES ---------------------------------
// Note: We are front-end only; these routes just return Blade views.
// The generic templates were removed, so we route directly to per-student week pages.

$studentViewMap = [
    // --------------------------------- Richard ---------------------------------
    // slug => folder
    'Chad' => 'Richard',

    // --------------------------------- Zaro ---------------------------------
];

Route::get('/students/{slug}', function (string $slug) use ($studentViewMap, $students) {
    $slug = trim($slug);

    $hasStudent = collect(array_keys($studentViewMap))
        ->contains(fn ($key) => strcasecmp($key, $slug) === 0);
    abort_unless($hasStudent, 404);

    $student = collect($students)->first(fn ($s) => isset($s['slug']) && strcasecmp($s['slug'], $slug) === 0);
    abort_unless($student, 404);
    $matchedKey = collect(array_keys($studentViewMap))
        ->first(fn ($key) => strcasecmp($key, $slug) === 0);
    $folder = $matchedKey ? $studentViewMap[$matchedKey] : null;
    $availableWeeks = $folder
        ? collect(range(1, 15))
            ->filter(fn ($week) => view()->exists('pages.students.' . $folder . '.week' . $week))
            ->values()
            ->all()
        : [];

    return view('pages.students.choose-week', [
        'student' => $student,
        'availableWeeks' => $availableWeeks,
    ]);
})->name('students.show');

Route::get('/students/{slug}/week-{week}', function (string $slug, int $week) use ($studentViewMap, $students) {
    $slug = trim($slug);

    $matchedKey = collect(array_keys($studentViewMap))
        ->first(fn ($key) => strcasecmp($key, $slug) === 0);
    abort_unless($matchedKey !== null, 404);
    abort_unless($week >= 1 && $week <= 15, 404);

    $folder = $studentViewMap[$matchedKey];
    $view = 'pages.students.' . $folder . '.week' . $week;
    abort_unless(view()->exists($view), 404);

    return view($view);
})->whereNumber('week')->name('students.week');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
