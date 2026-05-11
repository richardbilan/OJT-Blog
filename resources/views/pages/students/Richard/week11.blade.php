@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 11')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 11;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Fixing errors in production</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week was defined by non-stop coding and the relentless challenge of fixing errors in the production environment. While local development had been running smoothly, deploying to production revealed a completely different reality—errors that never appeared locally suddenly emerged in the live server, creating a constant stream of urgent issues that needed immediate attention.
                <br><br>
                The mental and emotional toll of this week was significant. I found myself feeling frustrated and sometimes overwhelmed by the sheer volume of 500 Internal Server Errors flooding the production logs. What made it especially difficult was the pressure of knowing that I was now the sole person responsible for editing and maintaining the production system. Every pull request, every code change, every hotfix rested on my shoulders alone, and the weight of that responsibility was immense.
                <br><br>
                The root cause of most 500 errors became clear as I investigated: migrating to real data was not the same as the new system structure. The actual data from the legacy system had inconsistencies, missing fields, and formats that differed from what the new RDMS V3 expected. Where local testing used clean, ideal sample data, the production database contained real-world records with edge cases and historical quirks that broke assumptions in the code. This mismatch between migrated data and system expectations triggered cascading failures across literally all modules.
                <br><br>
                My routine became relentless and exhausting: I kept reading error logs, identifying the specific data or code causing failures, editing fixes in my local environment, pushing to the repository, then pulling to production—non-stop coding, day and night. Time was always running out because each fix revealed another broken module, another 500 error, another data incompatibility. The pressure never let up because users needed the system functional, and every moment of downtime mattered.
                <br><br>
                The most harrowing experience came on the first day of active deployment. I was racing against the clock, trying to fix critical issues before our time window closed for the day. Under pressure, I made changes and pushed them to the main branch, then pulled the updates to production—only to watch in horror as the entire system crashed with 500 errors everywhere. Nothing was working. I had accidentally broken the production server with a single mistaken edit. The feeling of messing up so publicly, with real users potentially affected, was deeply upsetting and stressful. It took considerable effort to calm down, identify what went wrong, and carefully restore the system.
                <br><br>
                That incident taught me why editing in production is one of the riskiest aspects of software development. Unlike local development where mistakes are private and easily reversible, production errors are visible to everyone and can disrupt actual operations. I learned to be extremely cautious with every change—to double-check code before committing, to test more thoroughly even when under time pressure, and to understand exactly what each line of code does before pushing it live.
                <br><br>
                Throughout the week, I developed better habits for safe production editing and data migration handling: validating data structures before assuming they match expectations, adding defensive checks and null-safety to handle inconsistent legacy data, creating backups before major changes, reading error logs carefully instead of panicking, and making smaller, incremental changes rather than large risky updates. I figured out the patterns behind the migration-related errors and applied systematic fixes across modules.
                <br><br>
                Despite the frustration, stress, and sleepless nights of debugging every day and every night, this week was transformative for my technical maturity. I gained real-world experience with production troubleshooting, data migration complexities, and the psychological pressure of high-stakes debugging. I now understand deeply why thorough data validation and backward compatibility matter when migrating real historical records into new systems.
                <br><br>
                By the end of the week, while still exhausted, I felt more resilient and capable. The non-stop problem-solving, even when it made me want to give up, ultimately made me a more careful and competent developer. I learned that setbacks and 500 errors are part of the job, and what matters is the ability to recover, adapt to real-world data challenges, and keep improving under pressure.
            </div>
        </div>
    </div>
@endsection
