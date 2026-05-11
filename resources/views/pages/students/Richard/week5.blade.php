@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 5')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 5;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Standardization & Code Consistency</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on mid-phase tasks and collaboration, particularly ensuring consistency across the system. I coordinated with the team to confirm priorities, align on expected outputs, and make sure that the work I delivered matched the same UI patterns, table structures, and coding conventions used throughout the project. We discussed the importance of having a uniform look and feel so that users experience the system as one cohesive platform rather than disconnected parts, and I reviewed existing modules to understand the standard way of building pages, organizing components, and handling data flows.
                <br><br>
                I continued working on my assigned tasks while paying closer attention to quality and consistency. This meant adjusting my code to follow the established project structure—using the same styling approach, reusing common components, keeping folder organization aligned with other modules, and ensuring that tables, forms, buttons, and other UI elements follow the same design and behavior as the rest of the system. I also made sure my API calls, validation logic, and error handling follow the patterns already in place so the codebase remains maintainable and easy for others to understand.
                <br><br>
                Collaboration played a big role this week. Through regular updates, clarifications, and feedback from teammates, I was able to adjust quickly and avoid repeating mistakes. I also learned how to better review my own work against the existing standards before submitting, which reduced back-and-forth corrections and helped me deliver outputs that required fewer revisions.
                <br><br>
                By the end of the week, I was able to contribute more efficiently and felt more comfortable working within the team's workflow and structural expectations. Next week, I will focus on refining features, strengthening implementation details, and continuing to align my work with the system's unified standards to ensure everything I build feels consistent and professional.
                <br><br>
                I also spent time this week consulting with senior developers about specific implementation patterns they recommend for maintaining long-term code quality. They taught me about naming conventions that make variables and functions self-documenting, the importance of keeping functions focused on a single responsibility, and how to structure database queries for better performance. These insights helped me understand that standardization isn't just about making things look the same—it's about creating a codebase that is predictable, scalable, and easy to maintain as the project grows.
                <br><br>
                One practical exercise I did was comparing my current module against a recently completed module by another team member. I noted differences in how we handled similar features and discussed these with my mentor to understand which approach better follows the project's standards. This side-by-side review revealed several areas where I could improve, such as using shared utility functions instead of writing custom logic, and following the established pattern for handling form submissions and validation messages. Applying these learnings immediately improved the quality of my code and reduced the technical debt that could accumulate over time.
            </div>
        </div>
    </div>
@endsection
