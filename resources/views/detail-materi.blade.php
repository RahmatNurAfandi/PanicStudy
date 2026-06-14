@extends('layouts.app')

@section('title', 'Detail Materi - ' . $subject['title'])
@section('page_title', 'Detail Modul')

@section('content')
<div class="space-y-8">
    <!-- Back & Header -->
    <div class="space-y-4">
        <a href="{{ route('materi') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors group">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Materi
        </a>
        
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-900 border border-slate-800 rounded-2xl p-6 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-{{ $subject['color'] }}-500/5 to-transparent pointer-events-none"></div>
            <div class="space-y-2">
                <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-{{ $subject['color'] }}-500/10 text-{{ $subject['color'] }}-400 border border-{{ $subject['color'] }}-500/20">
                    {{ $subject['category'] }}
                </span>
                <h1 class="text-2xl font-bold text-white">{{ $subject['title'] }}</h1>
                <p class="text-sm text-slate-400 max-w-xl leading-relaxed">{{ $subject['description'] }}</p>
            </div>
            
            <div class="flex items-center gap-6 shrink-0 bg-slate-950 px-6 py-4 rounded-xl border border-slate-800/80">
                <div class="space-y-1">
                    <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Bab Selesai</p>
                    <p class="text-xl font-bold text-white">{{ $subject['completed_chapters'] }} / {{ $subject['chapters_count'] }}</p>
                </div>
                <div class="w-px h-10 bg-slate-800"></div>
                <div class="space-y-1">
                    <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">Pemahaman</p>
                    <p class="text-xl font-bold text-{{ $subject['color'] }}-400">{{ $subject['progress'] }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Chapters & Resources (Left Column) -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Checklist of Topics -->
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Topik & Silabus Pembelajaran</h2>
                    <p class="text-xs text-slate-400 mt-1">Centang topik yang telah selesai kamu pelajari hari ini.</p>
                </div>

                <div class="space-y-3">
                    @foreach($subject['topics'] as $topic)
                        <div class="bg-slate-950 p-4 rounded-xl border border-slate-850 hover:border-slate-800 transition-all flex items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <button class="w-5 h-5 rounded-md border-2 transition-all flex items-center justify-center shrink-0 {{ $topic['status'] === 'completed' ? 'bg-emerald-500 border-emerald-500 text-white' : ($topic['status'] === 'in_progress' ? 'border-amber-500 text-amber-500' : 'border-slate-700 hover:border-slate-600') }}">
                                    @if($topic['status'] === 'completed')
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @elseif($topic['status'] === 'in_progress')
                                        <div class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-ping"></div>
                                    @endif
                                </button>
                                <span class="text-sm font-medium {{ $topic['status'] === 'completed' ? 'text-slate-400 line-through' : 'text-slate-200' }}">
                                    {{ $topic['name'] }}
                                </span>
                            </div>
                            
                            <div class="flex items-center gap-3 shrink-0">
                                <span class="text-xs text-slate-500 font-medium">🕒 {{ $topic['duration'] }}</span>
                                <span class="text-[10px] px-2 py-0.5 rounded font-bold uppercase tracking-wider {{ $topic['status'] === 'completed' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : ($topic['status'] === 'in_progress' ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700') }}">
                                    {{ str_replace('_', ' ', $topic['status']) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Notes & Downloadable Resources -->
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Sumber Daya & Catatan Belajar</h2>
                    <p class="text-xs text-slate-400 mt-1">Unduh slide materi dan cheat sheet untuk membantumu belajar.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-850 hover:border-slate-800 transition-all flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-rose-500/10 text-rose-400 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-slate-200">Slide Kuliah.pdf</h4>
                                <p class="text-xs text-slate-550">14.2 MB • Slide Presentasi</p>
                            </div>
                        </div>
                        <button class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </button>
                    </div>

                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-850 hover:border-slate-800 transition-all flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-slate-200">Cheat Sheet Rumus.pdf</h4>
                                <p class="text-xs text-slate-550">2.8 MB • Rumus & Ringkasan</p>
                            </div>
                        </div>
                        <button class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pomodoro Timer (Right Column) -->
        <div class="space-y-8">
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6 relative overflow-hidden">
                <div class="absolute inset-0 bg-indigo-500/5 pointer-events-none"></div>
                
                <div class="text-center space-y-2">
                    <h2 class="text-lg font-bold text-white">Pomodoro Study Timer</h2>
                    <p class="text-xs text-slate-400">Jaga fokus dan produktivitas belajarmu dengan timer Pomodoro.</p>
                </div>

                <!-- Timer Display -->
                <div class="flex justify-center py-6">
                    <div class="w-44 h-44 rounded-full border-4 border-slate-800 flex flex-col items-center justify-center relative bg-slate-950/80 shadow-inner">
                        <div id="pomodoro-timer" class="text-4xl font-extrabold tracking-widest text-white">25:00</div>
                        <div id="pomodoro-status" class="text-[10px] text-indigo-400 font-semibold tracking-widest uppercase mt-1">Fokus Belajar</div>
                    </div>
                </div>

                <!-- Control Buttons -->
                <div class="grid grid-cols-3 gap-3">
                    <button id="btn-start" onclick="startTimer()" class="py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-sm font-semibold text-white transition-all shadow-md">
                        Mulai
                    </button>
                    <button id="btn-pause" onclick="pauseTimer()" class="py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-sm font-semibold text-slate-300 transition-all border border-slate-750" disabled>
                        Jeda
                    </button>
                    <button id="btn-reset" onclick="resetTimer()" class="py-2.5 rounded-xl bg-slate-800 hover:bg-slate-750 text-sm font-semibold text-slate-400 transition-all">
                        Reset
                    </button>
                </div>

                <!-- Settings Pomodoro -->
                <div class="grid grid-cols-2 gap-2 text-center text-xs">
                    <button onclick="setTimerMode('focus')" class="py-2 rounded-lg bg-indigo-500/10 text-indigo-400 font-semibold border border-indigo-500/20 hover:bg-indigo-500/20 transition-all">
                        💻 25m Fokus
                    </button>
                    <button onclick="setTimerMode('break')" class="py-2 rounded-lg bg-emerald-500/10 text-emerald-400 font-semibold border border-emerald-500/20 hover:bg-emerald-500/20 transition-all">
                        ☕ 5m Istirahat
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pomodoro Javascript Logic -->
<script>
    let timerInstance = null;
    let timerDuration = 25 * 60; // 25 minutes
    let timeRemaining = timerDuration;
    let timerMode = 'focus'; // 'focus' or 'break'

    const timerDisplay = document.getElementById('pomodoro-timer');
    const timerStatus = document.getElementById('pomodoro-status');
    const btnStart = document.getElementById('btn-start');
    const btnPause = document.getElementById('btn-pause');

    function updateDisplay() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    function startTimer() {
        if (timerInstance) return;

        btnStart.disabled = true;
        btnPause.disabled = false;
        btnStart.classList.add('opacity-50');

        timerInstance = setInterval(() => {
            if (timeRemaining > 0) {
                timeRemaining--;
                updateDisplay();
            } else {
                clearInterval(timerInstance);
                timerInstance = null;
                alert(timerMode === 'focus' ? 'Sesi fokus selesai! Waktunya istirahat.' : 'Waktu istirahat selesai! Mari fokus kembali.');
                resetTimer();
            }
        }, 1000);
    }

    function pauseTimer() {
        if (!timerInstance) return;
        clearInterval(timerInstance);
        timerInstance = null;
        btnStart.disabled = false;
        btnPause.disabled = true;
        btnStart.classList.remove('opacity-50');
    }

    function resetTimer() {
        pauseTimer();
        timeRemaining = timerDuration;
        updateDisplay();
    }

    function setTimerMode(mode) {
        timerMode = mode;
        if (mode === 'focus') {
            timerDuration = 25 * 60;
            timerStatus.textContent = 'Fokus Belajar';
            timerStatus.className = 'text-[10px] text-indigo-400 font-semibold tracking-widest uppercase mt-1';
        } else {
            timerDuration = 5 * 60;
            timerStatus.textContent = 'Istirahat Pendek';
            timerStatus.className = 'text-[10px] text-emerald-400 font-semibold tracking-widest uppercase mt-1';
        }
        resetTimer();
    }
</script>
@endsection
