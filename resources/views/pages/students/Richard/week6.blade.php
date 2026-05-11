@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 6')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 6;
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
            @php
                $extraHeroCandidates = [
                    'images/Students/' . $studentFolder . '/week' . $weekNumber . '.2.jpg',
                    'images/Students/' . $studentFolder . '/week' . $weekNumber . '.3.jpg',
                ];

                $heroImages = [$thumbRel];
                foreach ($extraHeroCandidates as $candidate) {
                    if (file_exists(public_path($candidate))) {
                        $heroImages[] = $candidate;
                    }
                }
                $heroImages = array_slice($heroImages, 0, 3);
            @endphp

            <div class="row g-0 h-100">
                @foreach ($heroImages as $idx => $imgRel)
                    <div class="col-12 col-md-{{ count($heroImages) === 1 ? 12 : (count($heroImages) === 2 ? 6 : 4) }} h-100">
                        <img
                            src="{{ asset($imgRel) }}"
                            alt="Week {{ $weekNumber }} image {{ $idx + 1 }}"
                            style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block;"
                        />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-body p-4 p-md-5">
            <div class="text-uppercase text-muted" style="letter-spacing: 0.14em; font-size: 11px;">Week {{ $weekNumber }} — OJT Weekly Log</div>
            <h2 class="h4 fw-semibold mt-2 mb-3">Refining Features & New Module Assignment</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on refining features, fixing issues, and improving details that affect usability and stability. I revisited completed parts of the system and conducted thorough testing to identify and clean up errors, including repairing non-working CRUD operations and other features that were not functioning as expected. I checked for edge cases, traced the causes of bugs, and made targeted adjustments to ensure the overall user experience was smoother and more reliable. I also learned that polishing work is just as important as building new features—small improvements such as proper error handling, correct form validations, and stable database operations can greatly affect the overall quality of the system. I worked carefully to avoid breaking existing behavior while making enhancements, ensuring that fixes did not introduce new issues elsewhere.
                <br><br>
                In the Student Research Module, I expanded the functionality by adding a Chair Panel and Panel Member management feature. This involved creating interfaces and logic to assign and manage chair panelists and panel members for student research entries, allowing the system to properly track who is involved in reviewing or overseeing each research project. I ensured these new features followed the same UI patterns, table structures, and coding conventions established in previous weeks to maintain consistency across the module.
                <br><br>
                Additionally, I was assigned to a new module: Documents. I began familiarizing myself with this module's requirements, understanding what types of documents need to be managed, how they relate to other modules like Student Research, and what workflows are involved in document creation, submission, tracking, and archiving. I started reviewing the existing codebase structure for this module and planned how to implement its features while maintaining alignment with the system's unified standards.
                <br><br>
                By the end of the week, the outputs felt more consistent, stable, and improved. The error cleanup and CRUD fixes made the system more dependable, while the new Chair Panel and Panel Member features added valuable functionality to the Student Research Module. The following week, I continued reviewing and fixing any remaining issues, began actual implementation work on the Documents module, and kept the system reliable and clean while delivering features that matched the team's quality expectations.
                <br><br>
                During the bug fixing process, I received guidance from senior developers on proper debugging techniques. They showed me how to use logging effectively to trace issues, how to isolate problems by testing components individually, and how to verify fixes thoroughly before considering a task complete. This mentorship helped me develop a more systematic approach to troubleshooting that I applied throughout the week's cleanup work.
                <br><br>
                For the Chair Panel and Panel Member features, I consulted with the team leads to understand the business rules around panel assignments. They explained the hierarchy between chair panelists and regular panel members, the approval workflows involved, and how these assignments should affect the research status. This domain knowledge was essential for implementing the features correctly and ensuring the system behavior matched real-world academic processes.
            </div>
        </div>
    </div>
@endsection
