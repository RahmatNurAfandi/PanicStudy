@extends('layouts.app')

@section('title', 'Materi Belajar')
@section('page_title', 'Materi Belajar')

@section('content')
<div class="space-y-8">
    <!-- Header Summary -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Modul & Materi Kuliah</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola, pelajari, dan lacak progres pemahaman materi belajarmu di sini.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs text-slate-400 bg-slate-900 border border-slate-800 px-4 py-2.5 rounded-xl font-medium">
                Total Subject: <span class="text-indigo-400 font-semibold">{{ count($subjects) }} Terdaftar</span>
            </span>
        </div>
    </div>

    <!-- Grid of Subjects -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($subjects as $subj)
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between hover:border-slate-700 transition-all duration-300 group">
                <div class="space-y-4">
                    <!-- Top Category & Badges -->
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold px-3 py-1 rounded-lg bg-{{ $subj['color'] }}-500/10 text-{{ $subj['color'] }}-400 border border-{{ $subj['color'] }}-500/20">
                            {{ $subj['category'] }}
                        </span>
                        <div class="flex items-center gap-1.5 text-xs text-slate-400">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span>{{ $subj['chapters_count'] }} Bab Pembelajaran</span>
                        </div>
                    </div>

                    <!-- Title & Description -->
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-white group-hover:text-indigo-400 transition-colors leading-tight">{{ $subj['title'] }}</h3>
                        <p class="text-sm text-slate-400 leading-relaxed">{{ $subj['description'] }}</p>
                    </div>

                    <!-- Status Details -->
                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-800/80 space-y-3">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Terakhir Dipelajari</span>
                            <span class="text-slate-300 font-medium">{{ $subj['last_studied'] }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-slate-500">Progress Bab</span>
                            <span class="text-slate-300 font-medium">{{ $subj['completed_chapters'] }} selesai dari {{ $subj['chapters_count'] }} bab</span>
                        </div>
                    </div>
                </div>

                <!-- Bottom Progress Bar & Button -->
                <div class="space-y-4 pt-6 border-t border-slate-850 mt-6">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Tingkat Pemahaman</span>
                            <span class="text-{{ $subj['color'] }}-400 font-semibold">{{ $subj['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                            <div class="bg-{{ $subj['color'] }}-500 h-full rounded-full transition-all duration-500" style="width: {{ $subj['progress'] }}%"></div>
                        </div>
                    </div>

                    <a href="{{ route('detail-materi', $subj['id']) }}" class="w-full text-center py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-sm font-semibold text-white block transition-all shadow-md hover:shadow-lg shadow-indigo-600/10">
                        Buka Detail Modul
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
