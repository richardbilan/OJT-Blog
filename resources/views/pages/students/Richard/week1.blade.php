@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 1')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 1;
        $studentFolder = 'chad';

        $thumbRel = null;
        $patterns = [
            'week' . $weekNumber . '.jpg',
            'week ' . $weekNumber . '.jpg',
            'Week ' . $weekNumber . '.jpg',
        ];
        foreach ($patterns as $pattern) {
            $candidate = 'images/Students/' . $studentFolder . '/' . $pattern;
            if (file_exists(public_path($candidate))) {
                $thumbRel = $candidate;
                break;
            }
        }
        $thumbRel = $thumbRel ?: 'images/Students/Richard Bilan.jpg';
    @endphp

    <div class="d-flex align-items-end justify-content-between gap-3 mb-3">
        <div class="d-flex align-items-center gap-3" style="min-width: 320px;">
            <a href="{{ route('students.show', ['slug' => $studentSlug]) }}" class="btn btn-link text-decoration-none choose-week__back" aria-label="Back">
                &lt;
            </a>
            <img
                src="{{ asset('images/Students/Richard Bilan.jpg') }}"
                alt="Richard D. Bilan Jr."
                style="width: 64px; height: 64px; border-radius: 999px; object-fit: cover;"
            />
            <div>
                <h1 class="h3 m-0 choose-week__name">Richard D. Bilan Jr.</h1>
                <div class="text-muted text-uppercase" style="letter-spacing: 0.12em; font-size: 12px;">FullStack Developer</div>
            </div>
        </div>

        <div class="text-center flex-grow-1" style="padding-bottom: 2px;">
            <div class="h5 mb-0 choose-week__title">Week {{ $weekNumber }}</div>
            <div class="choose-week__underline"></div>
        </div>

        <div style="min-width: 320px;"></div>
    </div>

    <div class="card border-0 shadow-sm rounded-4" style="overflow: hidden;">
        <div style="height: 420px;">
            <img src="{{ asset($thumbRel) }}" alt="Week {{ $weekNumber }}" style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
        <div class="card-body p-4 p-md-5">
            <div class="text-uppercase text-muted" style="letter-spacing: 0.14em; font-size: 11px;">Week {{ $weekNumber }} — OJT Weekly Log</div>
            <h2 class="h4 fw-semibold mt-2 mb-3">Getting Started & Orientation</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on getting started with the OJT program, understanding the team workflow, and preparing everything needed to contribute effectively to the project. I was oriented on the purpose of the system and how it supports day-to-day operations, including how users interact with the platform, how records are managed, and how the application ensures that information is organized and traceable.
                <br><br>
                I spent time familiarizing myself with the development environment and the tools used by the team. This included setting up the project locally, confirming that the application runs properly, and ensuring I have the required access and accounts to view the repository, track tasks, and follow the established workflow. I also reviewed the basic process for creating branches, committing changes, and submitting updates for review to match the team’s development standards.
                <br><br>
                To understand the system better, I reviewed the project structure and codebase layout. I explored the main modules and how they connect, including the separation of front-end and back-end responsibilities, how data flows from the user interface to the server/database, and how key pages and features are organized. I also checked important parts such as routing/navigation, reusable components, API/service calls, authentication or role-based access (if applicable), and the overall folder structure so I can locate files quickly when working on tasks.
                <br><br>
                I also had the chance to meet and interact with my senior developers and mentor. They shared practical advice from their experience and introduced me to different tech stacks, tools, and coding techniques that can make development easier and more efficient. I learned how using the right approach—such as structuring components properly, reusing code patterns, and following consistent conventions—can speed up implementation and reduce mistakes.
                <br><br>
                Throughout the week, I documented key learnings such as the project’s directory structure, naming conventions, and the common patterns used in the code. I also noted areas where I need to improve, especially in understanding specific business rules and the expected behavior of each feature. By the end of the week, I became more confident navigating the project, following the team workflow, and preparing myself to work on assigned tasks. Next week, I will focus on starting actual implementation and small feature/bug-fix tasks while continuing to strengthen my understanding of the system and its requirements.
            </div>
        </div>
    </div>
@endsection
