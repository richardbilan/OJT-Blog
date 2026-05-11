@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 4')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 4;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Presenting the Progress</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on consolidating our progress and presenting updates clearly to the team. Ma'am Jane scheduled a meeting where all OJT members were asked to present the progress of the system based on the tasks assigned to us each week. Before the meeting, I reviewed everything I completed, checked which parts still needed refinement, and organized my work so I could explain it properly and demonstrate the current status of the module.
                <br><br>
                During the meeting, I presented the updates on the tasks I was working on, especially the Student Research Module. I explained what features were already implemented, what improvements or fixes were still ongoing, and how the module works based on the intended workflow. I also discussed how the data is handled in the system—from input, saving, and retrieval—up to how the research records and related documents are expected to move across coordinators or offices based on the actual process. This helped ensure that the technical implementation aligns with real operations and expectations.
                <br><br>
                I also learned the importance of communicating progress in a structured way. Instead of only showing what was done, I practiced presenting what was completed and what value it adds to the system, the challenges encountered such as data consistency issues, migration concerns, and ensuring the workflow aligns with actual office processes, how I addressed or planned to address those issues through validation checks and closer coordination with the team, and finally the next steps and what I will focus on after the meeting to continue improving the module.
                <br><br>
                By the end of the week, I improved not only the technical output of my tasks but also the way I explain and present results to others. The meeting helped me understand the importance of updates, documentation, and clarity—especially when multiple people are working on different parts of the system. Next week, I will continue development while keeping a stronger focus on clarity, quality, and consistency, and I will apply the feedback or suggestions gathered during the progress presentation.
                <br><br>
                After the presentation, my senior developers and mentor gave me valuable feedback on how to improve both the module and my presentation approach. They suggested making the user interface more intuitive by adding clearer labels and status indicators, so users can easily understand the state of each research record at a glance. They also recommended simplifying some of the data entry flows to reduce confusion and potential errors. This feedback helped me identify specific areas where I can enhance the module's usability.
                <br><br>
                I also took time to document the feedback and create an action plan for the following week. I organized the suggestions into categories: UI/UX improvements, data validation enhancements, and workflow adjustments. I prioritized the tasks based on their impact on the overall system and the effort required to implement them. This structured approach will help me stay focused and ensure I'm addressing the most important issues first while maintaining steady progress on the module development.
            </div>
        </div>
    </div>
@endsection
