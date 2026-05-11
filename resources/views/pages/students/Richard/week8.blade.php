@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 8')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 8;
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
                    @php
                        $objectPosition = (substr($imgRel, -6) === '.2.jpg') ? '50% 20%' : 'center';
                    @endphp
                    <div class="col-12 col-md-{{ count($heroImages) === 1 ? 12 : (count($heroImages) === 2 ? 6 : 4) }} h-100">
                        <img
                            src="{{ asset($imgRel) }}"
                            alt="Week {{ $weekNumber }} image {{ $idx + 1 }}"
                            style="width: 100%; height: 100%; object-fit: cover; object-position: {{ $objectPosition }}; display: block;"
                        />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card-body p-4 p-md-5">
            <div class="text-uppercase text-muted" style="letter-spacing: 0.14em; font-size: 11px;">Week {{ $weekNumber }} — OJT Weekly Log</div>
            <h2 class="h4 fw-semibold mt-2 mb-3">EDMS Project Collaboration</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week marked a shift in my OJT assignment as Ma’am Jane moved me from the RDMS project to assist Sir Jes with the EDMS (Extension Document Management System). Since my tasks in RDMS were completed and there was a need for additional support in EDMS, this transition allowed me to contribute to another important system while continuing to develop my technical skills.
                <br><br>
                I started by understanding the EDMS project scope and expected workflow, particularly focusing on the Document module where Sir Jes needed assistance. I reviewed the existing structure, codebase architecture, naming conventions, and coding standards so that my contributions would seamlessly integrate with the system. EDMS handles extension-related documents and requires proper tracking, organization, and management of various document types—similar in concept to RDMS but with different business rules and user requirements.
                <br><br>
                My primary responsibilities involved polishing the Document module and cleaning up data. I worked on refining the user interface components to ensure they matched the established design patterns, fixing any inconsistencies in form behaviors, and improving the overall user experience. For the data cleanup, I identified and resolved issues with duplicate entries, missing fields, and improperly formatted records. I verified that existing documents were correctly categorized, linked to the appropriate records, and displayed accurately in the system. This process required careful validation to ensure that no important information was lost during the cleanup and that the database remained intact and reliable.
                <br><br>
                Throughout the week, Sir Jes guided me extensively, teaching me many valuable lessons in coding and system development. He showed me how to break down complex requirements into manageable implementation steps, how to approach debugging methodically by tracing issues to their root cause, and how to write cleaner, more maintainable code. I learned better practices for handling edge cases, ensuring that inputs are validated properly, errors are displayed clearly to users, and database operations remain stable. He also emphasized the importance of testing changes thoroughly before considering them complete, which helped me catch potential issues early and deliver more reliable work.
                <br><br>
                I improved my habit of reviewing similar existing features before implementing new ones, which helped me align my work with established patterns and avoid unnecessary rework. This practice saved time and ensured consistency across the module. Collaboration remained central to my progress—through regular discussions with Sir Jes, I received constructive feedback that improved both my technical execution and my understanding of how the Document module fits into the broader EDMS ecosystem.
                <br><br>
                To make the Document module more dependable, I also paid attention to the small details that affect data integrity. I double-checked validations on required fields, standardized how dates and reference numbers were stored, and ensured that document status and categorization were consistent across different pages. I also verified that edits and updates reflected correctly on the listing tables and detail views, so users would not get confused by outdated or incomplete information.
                <br><br>
                Another key learning this week was the importance of protecting existing data when doing cleanup. Before applying changes, I verified the records that would be affected, made sure relationships were preserved, and re-tested key workflows after each adjustment. This helped me become more cautious and systematic when working with real data, because even a small mistake in cleanup can affect multiple parts of the system.
                <br><br>
                By the end of the week, my work on the EDMS project felt more organized and consistent. I gained a better understanding of the module workflows, how documents flow through the extension management process, and how they fit into the overall system architecture. The experience significantly strengthened both my coding capabilities and my ability to collaborate effectively within a development team.
            </div>
        </div>
    </div>
@endsection
