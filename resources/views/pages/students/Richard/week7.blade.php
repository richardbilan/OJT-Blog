@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 7')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 7;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Bug Fixing, Review & Faculty Research Presentation</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on bug fixing, review, and presenting the Faculty Research module. I revisited existing features across the system, tested different scenarios, and identified areas where behavior was inconsistent or needed improvement. I learned to approach issues systematically—reproducing the problem, isolating the cause, implementing the fix, and confirming that it works without introducing side effects elsewhere. Code review and feedback from the team also helped me improve the readability and maintainability of my code.
                <br><br>
                A significant part of the week involved presenting the Faculty Research module and explaining how it integrates with the system dashboard. I demonstrated how faculty research records are created, updated, and managed, and how this data automatically reflects on the dashboard through charts and visual summaries. I explained how the dashboard aggregates research activity—showing metrics such as the number of faculty research entries, their status distribution, and progress indicators—which helps administrators and coordinators quickly see the overall research activity at a glance without manually checking each record. The charts update dynamically based on the data entered in the Faculty Research module, creating a real-time overview that supports decision-making and monitoring.
                <br><br>
                I also reviewed how the dashboard connects with other modules, ensuring that when faculty research data is added or modified, the visual representations and statistics remain accurate and consistent. This presentation helped the team understand the data flow from input to visualization and confirmed that the module is functioning as intended within the larger system.
                <br><br>
                By the end of the week, the overall output was more stable, the Faculty Research module was properly demonstrated and validated, and the team gained clarity on how dashboard reporting works. The following week, I continued polishing features, addressed remaining issues, and prepared the system for more complete and integrated deliverables.
                <br><br>
                Preparing for the presentation helped me organize my thoughts about the module architecture and understand the importance of clear documentation. I created diagrams showing the data relationships between the Faculty Research module and the dashboard components, which made explaining the integration much clearer. This experience taught me that visual aids and structured explanations are essential when communicating technical concepts to both technical and non-technical team members.
                <br><br>
                After the presentation, I received constructive feedback on both the module functionality and my delivery. Team members asked questions that revealed areas where the user interface could be more intuitive, particularly around filtering and searching research records. I also learned about specific dashboard metrics that stakeholders consider most important, which helped me prioritize which statistics to highlight in future updates. This feedback session was valuable for understanding user expectations and ensuring the system meets real operational needs.
            </div>
        </div>
    </div>
@endsection
