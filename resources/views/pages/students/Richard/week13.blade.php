@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 13')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 13;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Week 13</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                Week 13 followed the same high-pressure cycle of production maintenance: debug, fix, deploy, then repeat. I spent most of my time resolving issues found in the live system, where even small mismatches in data could trigger errors and disrupt workflows. I learned to be more careful and systematic—checking logs, identifying exactly which request or record caused the error, applying defensive handling for null or unexpected values, and confirming that the fix didn’t introduce new problems elsewhere.
                <br><br>
                Karl continued to perform QA testing, and his reports helped uncover issues that normal development testing would miss. The back-and-forth between QA and fixes became the week’s pattern: Karl tests, documents the issue, I implement the correction, then Karl re-checks to confirm the behavior is correct. This routine helped us stabilize the system faster because issues were caught early, verified properly, and didn’t remain unresolved for long.
                <br><br>
                At the same time, Wendee requested additional UI polishing—especially table improvements, consistent design treatment, and responsiveness adjustments. I refined table layouts so headers, columns, and action buttons stayed readable and aligned, and I ensured that spacing and styling felt uniform across pages. I also made improvements so the system remained usable on different screen sizes, reducing layout breaks and improving overall presentation.
                <br><br>
                By the end of Week 13, the system felt more stable and more consistent visually. Even though the work involved repeated debugging, it strengthened my ability to support a production system properly: respond quickly, apply safe fixes, verify changes through QA, and keep both functionality and design standards aligned.
            </div>
        </div>
    </div>
@endsection
