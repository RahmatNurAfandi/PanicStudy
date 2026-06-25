@extends('layouts.app')

@section('title', 'Progress Tracker')
@section('page_title', 'Progress Tracker')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-white">Analisis & Progres Belajar</h1>
        <p class="text-sm text-slate-400 mt-1">Lacak pencapaian akademikmu dan evaluasi efektivitas belajarmu secara mendalam.</p>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Section: Chart & Subject Progress -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Weekly Study Hours Chart -->
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Tren Waktu Belajar Mingguan</h2>
                    <p class="text-xs text-slate-400 mt-1">Representasi visual total jam belajarmu selama 7 hari terakhir.</p>
                </div>

                <!-- Custom Bar Chart using Tailwind -->
                <div class="h-64 flex items-end justify-between gap-2 pt-6 px-4 bg-slate-950 rounded-xl border border-slate-850">
                    @php
                        $maxHours = max($weeklyHours);
                    @endphp
                    @foreach($weeklyHours as $dayName => $hours)
                        @php
                            $heightPercent = $maxHours > 0 ? ($hours / $maxHours) * 80 : 0;
                        @endphp
                        <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                            <!-- Popover hours indicator -->
                            <span class="text-[10px] font-bold text-indigo-400 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                {{ $hours }}h
                            </span>
                            <!-- Bar -->
                            <div class="w-full max-w-[28px] bg-gradient-to-t from-indigo-600 to-violet-500 rounded-t-md transition-all duration-500 hover:brightness-110" style="height: {{ max($heightPercent, 5) }}%"></div>
                            <!-- Day Label -->
                            <span class="text-[10px] text-slate-500 font-semibold uppercase mt-2 pb-2">
                                {{ substr($dayName, 0, 3) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Subject Progress Detail -->
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Detail Progres Per Materi</h2>
                    <p class="text-xs text-slate-400 mt-1">Persentase penyelesaian silabus materi terdaftar.</p>
                </div>

                <div class="space-y-4">
                    @foreach($subjectProgress as $subProj)
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-semibold text-slate-200">{{ $subProj['name'] }}</span>
                                <span class="text-{{ $subProj['color'] }}-400 font-bold">{{ $subProj['percentage'] }}%</span>
                            </div>
                            
                            <div class="w-full bg-slate-950 h-2 rounded-full overflow-hidden border border-slate-800">
                                <div class="bg-{{ $subProj['color'] }}-500 h-full rounded-full transition-all duration-500" style="width: {{ $subProj['percentage'] }}%"></div>
                            </div>
                            
                            <div class="flex justify-between text-[11px] text-slate-500 font-medium">
                                <span>{{ $subProj['completed'] }} bab selesai</span>
                                <span>{{ $subProj['total'] - $subProj['completed'] }} bab tersisa</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Section: Activity Timeline Log -->
        <div class="space-y-8">
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Log Aktivitas Terbaru</h2>
                    <p class="text-xs text-slate-400 mt-1">Riwayat tindakan belajar terbarumu.</p>
                </div>

                <div class="relative pl-6 border-l-2 border-slate-800 space-y-8">
                    @foreach($recentActivities as $activity)
                        <div class="relative">
                            <!-- Badge icon indicator -->
                            <div class="absolute -left-[32px] top-0.5 w-5 h-5 rounded-full bg-slate-950 border border-slate-800 flex items-center justify-center text-{{ $activity['color'] }}-400">
                                @if($activity['icon'] === 'check-circle')
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @elseif($activity['icon'] === 'academic-cap')
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    </svg>
                                @else
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                @endif
                            </div>
                            <!-- Text Details -->
                            <div class="space-y-1">
                                <span class="text-[10px] text-slate-500 font-semibold">{{ $activity['time'] }}</span>
                                <p class="text-xs text-slate-350 leading-relaxed font-medium">{{ $activity['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
