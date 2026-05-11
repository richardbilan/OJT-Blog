@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'landing-bg')

@section('content')
    <section class="landing">
        <div class="landing__top">
            <div>
                <h1 class="landing__title"> BSIT STUDENTS DEVELOPERS</h1>
                <p class="landing__subtitle">Team BUCS RDMS - EDMS</p>
            </div>
         
        </div>

        <div class="landing__strip" aria-label="Landing cards">
            @foreach (($students ?? []) as $student)
                @if (!in_array($student['track'] ?? '', ['Mentor', 'Senior Developer'], true))
                    <a class="landing-card" href="{{ route('students.show', ['slug' => $student['slug']]) }}" style="--card-image: url('{{ asset($student['image']) }}');">
                        <div class="landing-card__overlay">
                            <div class="landing-card__tag">{{ $student['track'] }}</div>
                            <div class="landing-card__title">{{ $student['name'] }}</div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>

        <div class="mt-0">
            <div class="fw-semibold text-uppercase" style="letter-spacing: 0.12em; font-size: 12px; color: rgba(0,0,0,0.65);">
                Mentors / Senior Developers
            </div>
        </div>

        <div class="landing__strip" aria-label="Mentor cards">
            @foreach (($students ?? []) as $student)
                @if (in_array($student['track'] ?? '', ['Mentor', 'Senior Developer'], true))
                    <div class="landing-card landing-card--static" style="--card-image: url('{{ asset($student['image']) }}');">
                        <div class="landing-card__overlay">
                            <div class="landing-card__tag">{{ $student['track'] }}</div>
                            <div class="landing-card__title">{{ $student['name'] }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Extra Content Section -->
        <div class="mt-5 pt-4" id="about">
            <div class="row g-4">
                <!-- About Card -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 h-100 p-4" style="background: rgba(255, 255, 255, 0.45); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.4)!important;">
                        <h3 class="fw-bold mb-3">About us</h3>
                        <p class="text-muted mb-4">
                            The Bicol University College of Science Research Document Management System (BUCS RDMS) is developed to promote excellence in research management by providing a comprehensive, reliable, and user-friendly platform for handling scholarly documents and research activities. The system supports faculty members, students, and research coordinators in organizing, tracking, generating reports, and disseminating research outputs efficiently.

This system was designed and developed by Bachelor of Science in Information Technology (BSIT) On-the-Job Trainees (OJT) as part of their commitment to applying technological solutions that improve academic processes within the institution. Through streamlined workflows and integrated research management, the platform enhances collaboration, improves accessibility to research resources, and increases productivity within the academic community.

By facilitating efficient document management and the wider dissemination of research outputs, the BUCS RDMS contributes to the advancement of knowledge, innovation, and continuous research development within Bicol University and beyond.
                        </p>
                        
                    </div>
                </div>
        </div>
    </section>
@endsection
