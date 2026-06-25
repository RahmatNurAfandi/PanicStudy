@extends('layouts.app')

@section('title', 'Latihan Soal')
@section('page_title', 'Latihan Soal')

@section('content')
<div class="space-y-8">
    <!-- Header Summary -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-slate-900 border border-slate-800 rounded-2xl p-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-transparent pointer-events-none"></div>
        <div class="space-y-2">
            <h1 class="text-2xl font-bold text-white">Bank Soal & Simulasi Ujian</h1>
            <p class="text-sm text-slate-400 max-w-xl">Uji pemahaman belajarmu dengan kuis interaktif dan latihan soal mandiri.</p>
        </div>
        <div class="flex items-center gap-6 shrink-0 bg-slate-950 px-6 py-4 rounded-xl border border-slate-800/80">
            <div class="space-y-1">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Kuis Selesai</p>
                <p class="text-xl font-bold text-white">2 Latihan</p>
            </div>
            <div class="w-px h-10 bg-slate-800"></div>
            <div class="space-y-1">
                <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Rata-rata Skor</p>
                <p class="text-xl font-bold text-indigo-400">95 / 100</p>
            </div>
        </div>
    </div>

    <!-- Active Quizzes Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($quizzes as $quiz)
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between hover:border-slate-700 transition-all duration-300 group">
                <div class="space-y-4">
                    <!-- Top row category & status badge -->
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-{{ $quiz['color'] }}-500/10 text-{{ $quiz['color'] }}-400 border border-{{ $quiz['color'] }}-500/20">
                            {{ $quiz['subject'] }}
                        </span>
                        
                        @if($quiz['status'] === 'completed')
                            <span class="text-xs text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-0.5 rounded-full font-semibold">
                                Selesai
                            </span>
                        @else
                            <span class="text-xs text-slate-500 bg-slate-800 border border-slate-750 px-2.5 py-0.5 rounded-full font-medium">
                                Belum Mulai
                            </span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors leading-snug">
                        {{ $quiz['title'] }}
                    </h3>

                    <!-- Quiz Meta Details -->
                    <div class="grid grid-cols-3 gap-2 bg-slate-950 p-3 rounded-xl border border-slate-850 text-center">
                        <div class="space-y-0.5">
                            <p class="text-[10px] text-slate-500 uppercase tracking-wider">Soal</p>
                            <p class="text-xs font-semibold text-slate-300">{{ $quiz['questions_count'] }} Butir</p>
                        </div>
                        <div class="space-y-0.5">
                            <p class="text-[10px] text-slate-500 uppercase tracking-wider">Durasi</p>
                            <p class="text-xs font-semibold text-slate-300">{{ $quiz['duration'] }}</p>
                        </div>
                        <div class="space-y-0.5">
                            <p class="text-[10px] text-slate-500 uppercase tracking-wider">Kesulitan</p>
                            <p class="text-xs font-semibold text-slate-300">{{ $quiz['difficulty'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Score and Action -->
                <div class="pt-6 border-t border-slate-850 mt-6 flex items-center justify-between gap-4">
                    <div>
                        @if($quiz['best_score'] !== null)
                            <p class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold">Skor Terbaik</p>
                            <p class="text-lg font-extrabold text-emerald-400">{{ $quiz['best_score'] }} <span class="text-xs font-semibold text-slate-550">/ 100</span></p>
                        @else
                            <p class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold">Skor Terbaik</p>
                            <p class="text-sm font-semibold text-slate-550">Belum ada nilai</p>
                        @endif
                    </div>

                    @if($quiz['status'] === 'completed')
                        <button class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-750 text-xs font-semibold text-slate-300 transition-all border border-slate-750">
                            Ulangi Latihan
                        </button>
                    @else
                        <button class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-xs font-semibold text-white transition-all shadow-md shadow-indigo-600/10">
                            Mulai Latihan
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
