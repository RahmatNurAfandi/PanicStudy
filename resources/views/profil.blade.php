@extends('layouts.app')

@section('title', 'Profil Saya')
@section('page_title', 'Profil Saya')

@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <!-- Profile Card -->
    <div class="bg-slate-900 rounded-2xl border border-slate-800 p-8 flex flex-col md:flex-row items-center gap-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-transparent pointer-events-none"></div>
        
        <!-- Big Avatar -->
        <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-indigo-500 to-violet-500 flex items-center justify-center text-4xl font-extrabold text-white shadow-xl shadow-indigo-500/10 shrink-0">
            {{ substr($user->name ?? 'Azizi', 0, 1) }}
        </div>

        <div class="space-y-2 text-center md:text-left flex-1">
            <h2 class="text-2xl font-bold text-white">{{ $user->name ?? 'Azizi' }}</h2>
            <p class="text-sm text-slate-400 font-medium">{{ $user->email ?? 'azizi@panicstudy.com' }}</p>
            <div class="flex flex-wrap justify-center md:justify-start gap-2 pt-2">
                <span class="text-[10px] bg-slate-800 text-slate-300 border border-slate-750 px-2.5 py-1 rounded-full font-medium">
                    📅 Bergabung: {{ \Carbon\Carbon::parse($user->created_at)->format('M Y') }}
                </span>
                <span class="text-[10px] bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 px-2.5 py-1 rounded-full font-semibold">
                    🎓 Student Pro
                </span>
            </div>
        </div>

        <button class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-755 border border-slate-750 text-xs font-semibold text-slate-200 transition-all self-stretch md:self-auto text-center">
            Edit Profil
        </button>
    </div>

    <!-- Goals & Achievements Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Target & Goals -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
            <div>
                <h3 class="text-lg font-bold text-white">Target & Tujuan Belajar</h3>
                <p class="text-xs text-slate-400 mt-1">Pantau performa belajarmu terhadap target yang kamu tetapkan.</p>
            </div>

            <div class="space-y-5">
                @foreach($goals as $goal)
                    <div class="space-y-2">
                        <div class="flex items-start justify-between">
                            <div class="space-y-0.5">
                                <h4 class="text-sm font-semibold text-slate-200">{{ $goal['title'] }}</h4>
                                <p class="text-xs text-slate-500 font-medium">Target: {{ $goal['target'] }}</p>
                            </div>
                            <span class="text-xs text-indigo-400 font-bold bg-indigo-500/5 px-2 py-0.5 rounded border border-indigo-500/10">
                                {{ $goal['progress'] }}%
                            </span>
                        </div>
                        <div class="w-full bg-slate-950 h-2 rounded-full overflow-hidden border border-slate-850">
                            <div class="bg-indigo-500 h-full rounded-full transition-all duration-500" style="width: {{ $goal['progress'] }}%"></div>
                        </div>
                        <p class="text-[10px] text-slate-400 font-medium">✨ Capaian: {{ $goal['achieved'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Badges & Achievements -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6 space-y-6">
            <div>
                <h3 class="text-lg font-bold text-white">Pencapaian & Lencana</h3>
                <p class="text-xs text-slate-400 mt-1">Lencana penghargaan yang telah kamu buka dari aktivitas belajarmu.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                @foreach($achievements as $ach)
                    <div class="p-4 rounded-xl border {{ $ach['unlocked'] ? 'bg-slate-950/60 border-slate-800/80 hover:border-slate-700' : 'bg-slate-950/25 border-slate-900/60 opacity-50' }} transition-all flex flex-col items-center text-center gap-2 relative overflow-hidden group">
                        @if($ach['unlocked'])
                            <div class="absolute inset-0 bg-gradient-to-b from-indigo-500/5 to-transparent pointer-events-none"></div>
                        @endif

                        <!-- Badge Icon -->
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl shadow-inner {{ $ach['unlocked'] ? 'bg-indigo-500/10 text-indigo-400' : 'bg-slate-900 text-slate-650' }}">
                            @if($ach['icon'] === 'sun')
                                🌅
                            @elseif($ach['icon'] === 'code')
                                💻
                            @elseif($ach['icon'] === 'fire')
                                🔥
                            @else
                                📋
                            @endif
                        </div>

                        <div class="space-y-1">
                            <h4 class="text-xs font-bold text-white leading-tight">{{ $ach['title'] }}</h4>
                            <p class="text-[9px] text-slate-500 leading-normal">{{ $ach['description'] }}</p>
                        </div>

                        <!-- Status text -->
                        <span class="text-[8px] font-bold tracking-wider uppercase px-2 py-0.5 rounded {{ $ach['unlocked'] ? 'bg-indigo-500/10 text-indigo-400' : 'bg-slate-900 text-slate-600' }}">
                            {{ $ach['unlocked'] ? 'Terbuka' : 'Terkunci' }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
