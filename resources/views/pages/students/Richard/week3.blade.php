@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 3')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 3;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Coding</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week, I continued working on the Student Research Module and focused on improving my understanding of the system’s data flow and how real research documents and records are processed in actual office workflow. I spent time reviewing how the module interacts with other parts of the system, how information is stored and retrieved, and how each record is expected to move from one step to the next based on the team’s process.
                <br><br>
                A major part of the week involved migrating existing data into the module. I reviewed the current/legacy records and validated how they should map into the project’s database structure. I also checked for possible issues such as missing fields, inconsistent formats, duplicates, and mismatched values. During migration, I made sure the data remains accurate and usable in the system by verifying that each research entry appears correctly in the listing and detail views, and that related information (student details, titles, status, and other metadata) is preserved properly.
                <br><br>
                I also worked on understanding how real physical/official documents are handled and how they are passed between people involved in the process—especially how research files are routed to the appropriate research coordinators for checking, validation, and monitoring. This helped me understand the “real-world” workflow behind the module, including why certain fields, statuses, and tracking steps are important. I learned that the system is not just for storing information, but also for supporting coordination—making it easier to track where a document currently is, who is responsible for the next action, and what updates or follow-ups are required.
                <br><br>
                To strengthen my implementation, I reviewed how the module should reflect the actual process, such as:
                <br>
               ● Encoding and updating research records based on submitted documents
                <br>
                ● Tracking progress/status to reflect the current stage of the research
                <br>
                ● Ensuring proper handoff/assignment of records to coordinators when needed
                <br>
                ● Maintaining consistency and traceability, so records can be audited and followed up easily
                <br><br>
                By the end of the week, I gained a clearer understanding of both the technical flow (data and system behavior) and the operational flow (how documents and responsibilities move across coordinators). Next week, I will continue refining the Student Research Module by completing remaining features, improving validations and usability, and verifying that migrated data and workflows match the actual requirements before finalizing deliverables.
                <br><br>
                 I consulted my senior developers for feedback about the migration approach and how to handle edge cases. They reminded me to validate data early, standardize formats where possible, and keep the module flexible enough to handle incomplete legacy records without breaking the UI. This helped me become more careful about designing forms and views that can gracefully handle missing values while still keeping the data clean.
                <br><br>
                I also prepared follow-up tasks after migration, such as adding stronger validations, improving the consistency of field labels, and ensuring the module’s status tracking reflects the actual office workflow. I reviewed how search and filtering should behave when there are many records, and I planned how to test the module using real scenarios (duplicates, invalid inputs, and different status transitions). This preparation gave me a clearer direction for the next week’s implementation and refinement.
            </div>
        </div>
    </div>
@endsection
