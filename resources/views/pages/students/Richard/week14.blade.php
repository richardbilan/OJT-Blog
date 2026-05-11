@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 14')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 14;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Week 14</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week was still centered on production debugging, but with a stronger focus on polishing and consistency as the system moved closer to final readiness. I continued reviewing production logs and addressing errors that appeared in real usage. The fixes often involved handling edge cases gracefully—especially when production records contained incomplete or unexpected values. Instead of forcing the data to match ideal conditions, I adjusted the system to be more tolerant and stable, making sure it could handle real-world inputs without crashing.
                <br><br>
                Karl maintained the same QA routine, repeatedly checking workflows and reporting anything that caused incorrect behavior or broken UI. His testing helped validate that the system was improving each time we pushed changes. The collaboration made debugging more efficient because it created a clear feedback loop: identify the problem, fix it, confirm the fix, then proceed to the next issue.
                <br><br>
                Wendee also continued requesting UI changes, particularly improvements in table design consistency and responsiveness. I implemented updates that made table pages feel more uniform—consistent spacing, consistent button placement, consistent typography, and better responsiveness so the layout stays clean even on smaller screens. These changes were important because the system’s credibility depends not only on working features but also on a professional and consistent user experience.
                <br><br>
                By the end of the week, the system was noticeably more stable than earlier post-deployment stages. The continuous debugging reduced production interruptions, and the UI refinements improved readability and usability. This week reinforced the importance of quality assurance and iteration—fixing bugs is not a one-time task, and improving the UI is part of making the system truly “done.”
            </div>
        </div>
    </div>
@endsection
