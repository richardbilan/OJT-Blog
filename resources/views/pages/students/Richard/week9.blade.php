@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 9')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 9;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Preparation & Finalization</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on finalizing the outputs and making sure the system was ready for deployment. I reviewed pending tasks, double-checked completed features, and ensured that the overall flow was stable and consistent across pages.
                <br><br>
                A big part of the week was verifying that the buttons and CRUD operations were working properly. I tested different scenarios to confirm that create, update, and delete actions behaved correctly, that forms saved the right data, and that error handling and validations were clear to users. Finalization required careful review because even small issues—like a broken button action or an incorrect validation—could affect the reliability of the whole system.
                <br><br>
                Karl also played an important role by continuously doing QA testing on the system. He checked different modules, reported bugs or inconsistencies, and helped identify edge cases that were easy to miss during development. Whenever Karl found an issue, I fixed it right away so the corrections could be re-tested immediately and the bug would not carry over to deployment.
                <br><br>
                To make the QA process more efficient, we followed a simple checklist approach during testing. We validated page navigation, verified that search and filter behaviors returned the expected results, checked that table actions triggered the correct endpoints, and ensured that success and error messages were displayed clearly. This helped us spot UI inconsistencies quickly and confirm that each module behaved the same way across the system.
                <br><br>
                After applying fixes, I also did regression testing to make sure the changes did not break other working features. I re-tested common workflows end-to-end, confirmed that permissions and visibility rules were still correct, and reviewed the database records to ensure that updates were saved properly. This step was important because even a small adjustment in one part of the system can unintentionally affect other parts.
                <br><br>
                Since the goal was to deploy to ICTO, I also focused on deployment readiness. I made sure there were no obvious blockers in the core flows, verified that critical forms and actions were stable, and coordinated with the team to confirm which modules were considered complete for release. This made the overall output feel more professional and reduced the risk of last-minute issues during deployment.
                <br><br>
                By the end of the week, the outputs were more polished and dependable. The continuous QA and quick fixes helped ensure that the core actions and workflows were functioning properly, and the system was in a better state for deployment to ICTO.
            </div>
        </div>
    </div>
@endsection
