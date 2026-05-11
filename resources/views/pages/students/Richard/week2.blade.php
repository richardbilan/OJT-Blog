@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 2')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 2;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Assigning Modules</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on understanding the modules assigned to me and clarifying the scope of work, particularly the Student Research Module. I reviewed the requirements and discussed with the team what the module is expected to accomplish, who the intended users are, and what workflows must be supported. I also broke down the module into smaller tasks (UI, validations, database/API flow, and testing) so I can handle the work in a more organized and manageable way.
                <br><br>
                For the Student Research Module, I learned that it is responsible for handling research-related records and processes for students. It covers how student research information is encoded, updated, tracked, and managed in the system. I reviewed the key data that the module needs to store and display, such as student details, research title/topic, research category/type (if applicable), adviser or mentor details, research status/progress, and any required submission or record history. I also checked how these records are expected to move through the workflow—from initial entry, to review/approval (if part of the process), and until the research is completed or archived—so that the module remains consistent with the project’s rules and structure.
                <br><br>
                I spent time aligning with the team’s development process to avoid misunderstandings. This included understanding how tasks are tracked (ticketing/board updates), how progress is communicated (daily updates or check-ins), and how changes are reviewed before being merged. I also examined how the codebase is structured for modules like this—where pages are located, how API calls are handled, how forms and tables are implemented, and what naming conventions or reusable components should be followed to keep my work consistent with the existing code.
                <br><br>
                By the end of the week, I had a clearer plan for implementation, including the priority features to build first (core listing and viewing of research records, add/edit functions, validations, and basic filtering/search if required). I also identified potential risks early, such as ensuring correct field validations, avoiding duplicate records, and making sure the module matches the expected workflow and permissions. Next week, I will focus more on coding and completing the first set of deliverables for the Student Research Module, while continuously coordinating with the team for feedback and adjustments.
                <br><br>
               I consulted my senior developers about the best way to implement the module efficiently. They advised me to start with the simplest end-to-end flow first—design the basic UI, connect it to the expected data structure, then apply validations and edge-case handling afterward. They also emphasized using reusable components and consistent patterns (tables, form layouts, and input validation rules) so that future pages remain easier to maintain and update.
                <br><br>
                To prepare for development, I outlined the screens and user actions that the module should support, such as listing research records, viewing a record’s full details, adding new entries, updating existing entries, and confirming deletion or archiving actions (if allowed). I also prepared a checklist for testing, focusing on required fields, duplicate prevention, correct status transitions, and ensuring the display remains consistent for different users or permissions. This preparation helped me feel more confident starting the actual coding phase on the following week.
            </div>
        </div>
    </div>
@endsection
