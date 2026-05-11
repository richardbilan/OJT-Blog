@extends('layouts.app')

@section('title', ($student['name'] ?? 'Student') . ' - Weekly Logs')

@section('content')
    @php
        $palette = [
            ['accent' => '#22c55e', 'tagBg' => 'rgba(34, 197, 94, 0.12)', 'tagText' => '#15803d'],
            ['accent' => '#f97316', 'tagBg' => 'rgba(249, 115, 22, 0.12)', 'tagText' => '#c2410c'],
            ['accent' => '#8b5cf6', 'tagBg' => 'rgba(139, 92, 246, 0.12)', 'tagText' => '#6d28d9'],
            ['accent' => '#06b6d4', 'tagBg' => 'rgba(6, 182, 212, 0.12)', 'tagText' => '#0e7490'],
        ];

        $weekTitles = [
            1 => 'Getting Started & Orientation',
            2 => 'Assigning Modules',
            3 => 'Coding',
            4 => 'Presenting the Progress',
            5 => 'Standardization & Code Consistency',
            6 => 'Refining Features & New Module Assignment',
            7 => 'Bug Fixing, Review & Faculty Research Presentation',
            8 => 'EDMS Project Collaboration',
            9 => 'Preparation & Finalization',
            10 => 'Deploying the RDMS V3',
            11 => 'Fixing errors in production',
            12 => 'Wrap-Up & Lessons Learned',
            13 => 'Week 13',
            14 => 'Week 14',
            15 => 'Week 15',
        ];

  

        $weeks = [];
        for ($i = 1; $i <= 15; $i++) {
            $p = $palette[($i - 1) % count($palette)];
            $weeks[] = [
                'number' => $i,
                'accent' => $p['accent'],
                'tagBg' => $p['tagBg'],
                'tagText' => $p['tagText'],
                'tag' => 'Week ' . $i,
                'title' => $weekTitles[$i] ?? ('Week ' . $i),
                'desc' => $weekDescs[$i] ?? 'Weekly entry overview.',
                'date' => 'Week ' . $i,
            ];
        }

        $studentFolder = \Illuminate\Support\Str::slug($student['slug'] ?? '');
    @endphp
    <div class="d-flex align-items-end justify-content-between gap-3 mb-3">
        <div class="d-flex align-items-center gap-3" style="min-width: 320px;">
            <a href="{{ route('home') }}" class="btn btn-link text-decoration-none choose-week__back" aria-label="Back">
                &lt;
            </a>
            <img
                src="{{ asset($student['image'] ?? '') }}"
                alt="{{ $student['name'] ?? 'Student' }}"
                style="width: 64px; height: 64px; border-radius: 999px; object-fit: cover;"
            />
            <div>
                <h1 class="h3 m-0 choose-week__name">{{ $student['name'] ?? 'Student' }}</h1>
                <div class="text-muted text-uppercase" style="letter-spacing: 0.12em; font-size: 12px;">
                    {{ $student['track'] ?? '' }}
                </div>
            </div>
        </div>

        <div class="text-center flex-grow-1" style="padding-bottom: 2px;">
            <div class="h5 mb-0 choose-week__title">Weekly Logs</div>
            <div class="choose-week__underline"></div>
        </div>

        <div style="min-width: 320px;"></div>
    </div>


    <div class="row g-3 week-cards">
        @foreach ($weeks as $w)
            @php
                $thumbRel = null;
                $thumbExists = false;
                if ($studentFolder) {
                    $patterns = [
                        'week' . $w['number'] . '.jpg',
                        'week ' . $w['number'] . '.jpg',
                        'Week ' . $w['number'] . '.jpg',
                    ];
                    foreach ($patterns as $pattern) {
                        $candidate = 'images/Students/' . $studentFolder . '/' . $pattern;
                        if (file_exists(public_path($candidate))) {
                            $thumbRel = $candidate;
                            $thumbExists = true;
                            break;
                        }
                    }
                }
                $fallbackRel = $student['image'] ?? null;
                $fallbackExists = $fallbackRel ? file_exists(public_path($fallbackRel)) : false;
                $bgRel = $thumbExists ? $thumbRel : ($fallbackExists ? $fallbackRel : null);
                $bgExists = (bool) $bgRel;
            @endphp
            <div class="col-12 col-md-6 week-card-col">
                <a
                    href="{{ route('students.week', ['slug' => $student['slug'], 'week' => $w['number']]) }}"
                    class="text-decoration-none d-block h-100"
                    style="color: inherit;"
                >
                    <div
                        class="card h-100 border-0 week-card"
                        style="border-radius: 16px; box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08); overflow: hidden; {{ $bgExists ? ('background-image: url(' . "'" . asset($bgRel) . "'" . '); background-size: cover; background-position: center; box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08), inset 0 0 0 9999px rgba(0,0,0,0.08);') : '' }}"
                    >
                        <div style="height: 1px; background: rgba(15, 23, 42, 0.10);"></div>

                        <div class="card-body p-3 d-flex flex-column">
                            <div class="text-uppercase" style="letter-spacing: 0.12em; font-size: 12px; font-weight: 600; color: {{ $bgExists ? 'rgba(255,255,255,0.90)' : 'rgba(0,0,0,0.60)' }}; {{ $bgExists ? 'text-shadow: 0 2px 10px rgba(0,0,0,0.65);' : '' }}">
                                Week {{ $w['number'] }}
                            </div>

                            <div class="mt-3">
                                <div class="h6 fw-bold mb-2 week-card__title" style="{{ $bgExists ? 'color: rgba(255,255,255,0.96); text-shadow: 0 2px 10px rgba(0,0,0,0.65);' : '' }}">{{ $w['title'] }}</div>
                                <div class="text-muted" style="font-size: 13px; {{ $bgExists ? 'color: rgba(255,255,255,0.86) !important; text-shadow: 0 2px 10px rgba(0,0,0,0.65);' : '' }}">{{ $w['desc'] }}</div>
                            </div>

                          
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
