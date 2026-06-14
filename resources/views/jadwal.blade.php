@extends('layouts.app')

@section('title', 'Jadwal Belajar')
@section('page_title', 'Jadwal Mingguan')

@section('content')
<div class="space-y-8">
    <!-- Header Summary -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white">Kalender & Rencana Mingguan</h1>
            <p class="text-sm text-slate-400 mt-1">Kelola pembagian waktu belajar harianmu agar tetap seimbang dan terorganisir.</p>
        </div>
        <a href="{{ route('tambah-jadwal') }}" class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold text-sm transition-all duration-200 shadow-lg shadow-indigo-600/30 text-white flex items-center gap-2 self-start md:self-auto">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Sesi Belajar
        </a>
    </div>

    <!-- Weekly View Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
            <div class="bg-slate-900 rounded-2xl border border-slate-800 p-5 space-y-4 hover:border-slate-700 transition-colors flex flex-col">
                <!-- Day Title -->
                <div class="flex items-center justify-between pb-3 border-b border-slate-800/80">
                    <h3 class="font-bold text-white text-base">{{ $day }}</h3>
                    <span class="text-xs text-slate-500 font-medium">
                        {{ count($schedule[$day] ?? []) }} Sesi
                    </span>
                </div>

                <!-- Day Schedule List -->
                <div class="space-y-3 flex-1">
                    @forelse($schedule[$day] ?? [] as $session)
                        <div class="bg-slate-950 p-4 rounded-xl border border-slate-850 hover:border-slate-800 transition-all space-y-2 relative overflow-hidden group">
                            <!-- Left Color Bar -->
                            <div class="absolute left-0 top-0 bottom-0 w-1 bg-{{ $session['color'] }}-500"></div>

                            <div class="flex items-start justify-between gap-3">
                                <span class="text-xs font-semibold text-{{ $session['color'] }}-400">
                                    {{ $session['time'] }}
                                </span>
                                <span class="text-[9px] px-2 py-0.5 rounded font-bold uppercase tracking-wider bg-slate-800 border border-slate-700 text-slate-400 group-hover:border-slate-600 transition-colors">
                                    {{ $session['priority'] }}
                                </span>
                            </div>

                            <h4 class="text-sm font-semibold text-slate-200 leading-snug group-hover:text-white transition-colors">
                                {{ $session['activity'] }}
                            </h4>

                            <p class="text-xs text-slate-500 font-medium">
                                {{ $session['subject'] }}
                            </p>
                        </div>
                    @empty
                        <div class="h-28 rounded-xl border border-dashed border-slate-800 flex flex-col items-center justify-center text-slate-600 space-y-1">
                            <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-xs font-medium">Tidak ada sesi</span>
                        </div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
