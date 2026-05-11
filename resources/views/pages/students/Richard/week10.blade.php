@extends('layouts.app')

@section('title', 'Richard Bilan Jr. - Week 10')

@section('content')
    @php
        $studentSlug = 'Chad';
        $weekNumber = 10;
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
            <h2 class="h4 fw-semibold mt-2 mb-3">Deploying the RDMS V3</h2>
            <div class="text-muted" style="font-size: 14px; line-height: 1.9;">
                This week focused on deploying the system as RDMS V3, marking a major milestone in the project. Sir John guided us through the complete deployment process and taught us how deployment works in ICTO (Information and Communications Technology Office), including how the server environment runs the system, what infrastructure is involved, and what steps are needed to move from a local development setup to a production-ready deployment that actual users can access.
                <br><br>
                This was the hardest challenge I faced throughout my entire OJT experience. As someone fresh and completely new to server administration and production deployment—especially within our school's ICTO infrastructure—I found the process incredibly difficult and overwhelming at first. The complexity of managing server configurations, understanding how the production environment differs from local development, and ensuring everything works correctly on live servers was far more demanding than any coding task I had handled before. Sir John was instrumental in getting me through this; he patiently taught me everything he knew about deployment, walking me through each step, explaining the "why" behind every configuration decision, and reassuring me when I felt stuck. His mentorship transformed what felt like an impossible task into a manageable, learnable process.
                <br><br>
                I learned that deployment is far more complex than simply uploading files—it requires careful preparation across multiple areas. Sir John explained the importance of environment configuration, ensuring that the correct .env settings, database connections, and application keys are properly set for the production server rather than local development. He demonstrated how dependencies must be properly installed using Composer and NPM in the production environment, and how database migrations and seeders must be applied safely without corrupting or losing existing data. We also covered how to handle file permissions, storage directories, and log paths so the application can write files, cache data, and record errors without permission conflicts.
                <br><br>
                As part of the deployment preparation, I helped review the system for stability and readiness. We systematically checked that important modules—such as Faculty Research, Student Research, and Documents—were functioning properly end-to-end. We validated core CRUD operations to ensure data could be created, read, updated, and deleted without errors or data loss. We verified that authentication and role-based access controls were working correctly, since security becomes more critical in a production environment with real users. We also confirmed that error handling and validations were clear and user-friendly, because these small details become significantly more important once real users start interacting with the system and need guidance when something goes wrong.
                <br><br>
                Sir John taught us how to troubleshoot issues during deployment, which differs greatly from local debugging. He showed us what to check when something fails in production: reviewing server logs to identify error patterns, checking database connection stability and query performance, verifying that environment variables are loaded correctly, and ensuring that file uploads and exports have proper directory permissions and sufficient server resources. This helped me understand how problem-solving changes when the system is running on an actual server environment—where you cannot simply refresh the page or restart the server arbitrarily, and where every change must be planned to avoid disrupting users.
                <br><br>
                The week also improved my understanding of production standards—the importance of backing up data before making changes, testing on a staging environment before touching production, communicating deployment schedules to stakeholders, and having a rollback plan ready in case issues arise. I learned that a successful deployment is not just about getting the system online, but about ensuring it stays reliable, secure, and maintainable over time.
                <br><br>
                By the end of the week, the deployment process was clearer to me, and despite being the hardest part of my OJT journey, I gained significantly more confidence in preparing a system for ICTO release thanks to Sir John's patient guidance. The experience strengthened my awareness of production standards, the discipline required when moving from development to live environments, and the importance of thorough checking both before and after deployment to ensure a smooth transition for end users.
            </div>
        </div>
    </div>
@endsection
