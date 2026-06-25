@extends('layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="relative overflow-hidden bg-slate-900 rounded-2xl border border-slate-800 p-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 via-transparent to-violet-500/10 pointer-events-none"></div>
        <div class="space-y-2">
            <h1 class="text-3xl font-extrabold tracking-tight text-white">Selamat Datang Kembali, {{ $user->name ?? 'Azizi' }}! 👋</h1>
            <p class="text-slate-400 max-w-xl">Kamu telah belajar selama <span class="text-indigo-400 font-semibold">{{ $stats['weekly_hours'] }} jam</span> minggu ini. Tetap konsisten dan capai target belajarmu hari ini!</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('tambah-jadwal') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold text-sm transition-all duration-200 shadow-lg shadow-indigo-600/30 text-white flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Jadwal
            </a>
            <a href="{{ route('materi') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 font-semibold text-sm transition-all duration-200 text-slate-200">
                Lihat Materi
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Weekly Hours -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex items-center gap-5 hover:border-indigo-500/30 transition-all duration-300 group">
            <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Jam Belajar Minggu Ini</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ $stats['weekly_hours'] }} Jam</h3>
            </div>
        </div>

        <!-- Task Completion -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex items-center gap-5 hover:border-emerald-500/30 transition-all duration-300 group">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tugas Selesai</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ $stats['completed_tasks'] }} / {{ $stats['total_tasks'] }}</h3>
            </div>
        </div>

        <!-- Today Schedule Count -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex items-center gap-5 hover:border-rose-500/30 transition-all duration-300 group">
            <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Jadwal Hari Ini</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ $stats['today_tasks_count'] }} Sesi</h3>
            </div>
        </div>

        <!-- Study Streak -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 flex items-center gap-5 hover:border-amber-500/30 transition-all duration-300 group">
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.99 7.99 0 0120 13a7.99 7.99 0 01-2.343 5.657z" />
                </svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Active Streak</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ $stats['streak'] }} Hari</h3>
            </div>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Left Column: Tasks and Subjects -->
        <div class="xl:col-span-2 space-y-8">
            <!-- Active Planners (Tasks due today) -->
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-white">Tugas & Rencana Belajar Aktif</h2>
                        <p class="text-xs text-slate-400 mt-1">Daftar tugas terdekat yang perlu segera kamu selesaikan.</p>
                    </div>
                    <span class="text-xs text-indigo-400 bg-indigo-500/10 px-3 py-1 rounded-full border border-indigo-500/20 font-semibold">Tugas Aktif</span>
                </div>

                <div class="space-y-3">
                    @forelse($tasks as $task)
                        <div class="bg-slate-950 p-4 rounded-xl border border-slate-800/80 flex items-center justify-between hover:border-slate-700 transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-2.5 h-2.5 rounded-full {{ $task->priority === 'high' ? 'bg-rose-500' : ($task->priority === 'medium' ? 'bg-amber-500' : 'bg-slate-500') }}"></div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-slate-200">{{ $task->title }}</h4>
                                    <p class="text-xs text-slate-400">{{ $task->subject }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-xs text-slate-400">🕒 {{ $task->due_date }} • {{ $task->due_time }}</span>
                                <span class="text-xs px-2.5 py-1 rounded-md font-semibold tracking-wide uppercase {{ $task->priority === 'high' ? 'bg-rose-500/10 text-rose-400 border border-rose-500/20' : ($task->priority === 'medium' ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20' : 'bg-slate-800 text-slate-400 border border-slate-700') }}">
                                    {{ $task->priority }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500 text-center py-4">Tidak ada tugas aktif saat ini. Bagus sekali!</p>
                    @endforelse
                </div>
            </div>

            <!-- Subject Shortcut Grid -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-bold text-white">Materi Kuliah & Sekolah</h2>
                        <p class="text-xs text-slate-400 mt-1">Daftar materi pelajaran yang sedang kamu pelajari.</p>
                    </div>
                    <a href="{{ route('materi') }}" class="text-xs text-indigo-400 hover:text-indigo-300 font-semibold flex items-center gap-1">
                        Lihat Semua 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($subjects as $subj)
                        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-4 hover:-translate-y-1 hover:border-slate-700 transition-all duration-300 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-{{ $subj['color'] }}-500/10 text-{{ $subj['color'] }}-400 border border-{{ $subj['color'] }}-500/20">
                                        {{ $subj['category'] }}
                                    </span>
                                    <span class="text-xs text-slate-400">{{ $subj['completed_chapters'] }}/{{ $subj['chapters_count'] }} Bab</span>
                                </div>
                                <h3 class="font-bold text-white text-base leading-tight">{{ $subj['title'] }}</h3>
                                <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">{{ $subj['description'] }}</p>
                            </div>

                            <div class="space-y-3 pt-4 border-t border-slate-800/80 mt-auto">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-slate-400">Progress Belajar</span>
                                    <span class="text-{{ $subj['color'] }}-400 font-semibold">{{ $subj['progress'] }}%</span>
                                </div>
                                <div class="w-full bg-slate-800 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-{{ $subj['color'] }}-500 h-full rounded-full" style="width: {{ $subj['progress'] }}%"></div>
                                </div>
                                <a href="{{ route('detail-materi', $subj['id']) }}" class="w-full text-center py-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-semibold text-slate-200 block transition-all">
                                    Lanjutkan Belajar
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column: Today's Timeline Schedule -->
        <div class="space-y-8">
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-white">Jadwal Hari Ini</h2>
                    <p class="text-xs text-slate-400 mt-1">Sesi belajar yang telah kamu jadwalkan untuk hari ini.</p>
                </div>

                <div class="relative pl-6 border-l-2 border-slate-800 space-y-8">
                    @forelse($schedule as $sched)
                        <div class="relative">
                            <!-- Bullet Point -->
                            <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-slate-950 border-2 border-{{ $sched['color'] }}-500 flex items-center justify-center">
                                <div class="w-1.5 h-1.5 rounded-full bg-{{ $sched['color'] }}-500"></div>
                            </div>
                            <!-- Card Content -->
                            <div class="space-y-1">
                                <span class="text-xs font-semibold text-{{ $sched['color'] }}-400">{{ $sched['time'] }}</span>
                                <h4 class="text-sm font-semibold text-slate-200 leading-snug">{{ $sched['activity'] }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-[10px] bg-slate-800/80 px-2 py-0.5 rounded border border-slate-700/60 text-slate-400">{{ $sched['subject'] }}</span>
                                    <span class="text-[10px] bg-{{ $sched['color'] }}-500/10 px-2 py-0.5 rounded text-{{ $sched['color'] }}-400 font-medium">{{ $sched['type'] }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500 py-4 text-center">Tidak ada jadwal belajar hari ini. Hubungkan jadwal belajarmu sekarang!</p>
                    @endforelse
                </div>

                <a href="{{ route('jadwal') }}" class="w-full text-center py-2.5 rounded-xl border border-slate-800 hover:bg-slate-800 text-xs font-semibold text-slate-300 block transition-all">
                    Lihat Kalender Mingguan
                </a>
            </div>
            
            <!-- Quick Tips Panel -->
            <div class="bg-indigo-950/20 border border-indigo-500/10 rounded-2xl p-6 space-y-3 relative overflow-hidden">
                <div class="absolute inset-0 bg-indigo-500/5 blur-3xl rounded-full -top-12 -right-12"></div>
                <div class="flex items-center gap-2 text-indigo-400">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h4 class="text-sm font-bold text-white">Tips Efektivitas Belajar</h4>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">Gunakan teknik Pomodoro: Belajar terfokus selama 25 menit, lalu istirahat selama 5 menit. Ulangi 4 kali sebelum mengambil istirahat panjang 15-30 menit!</p>
            </div>
        </div>
    </div>
</div>
@endsection