@extends('layouts.app')

@section('title', 'Tambah Jadwal Belajar')
@section('page_title', 'Tambah Jadwal')

@section('content')
<div class="space-y-6 max-w-2xl mx-auto">
    <!-- Back button -->
    <a href="{{ route('jadwal') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors group">
        <svg class="w-4.5 h-4.5 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Jadwal Mingguan
    </a>

    <!-- Form Container -->
    <div class="bg-slate-900 rounded-2xl border border-slate-800 p-8 space-y-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-transparent pointer-events-none"></div>
        
        <div>
            <h2 class="text-xl font-bold text-white">Buat Sesi Belajar Baru</h2>
            <p class="text-xs text-slate-400 mt-1">Isi formulir di bawah ini untuk menambahkan jadwal atau rencana belajar baru ke dalam kalender mingguanmu.</p>
        </div>

        <form action="{{ route('simpan-jadwal') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Activity Title -->
            <div class="space-y-2">
                <label for="activity" class="text-sm font-semibold text-slate-300">Nama Aktivitas / Rencana Belajar</label>
                <input type="text" name="activity" id="activity" required placeholder="Contoh: Menyelesaikan Tugas Aljabar Linear" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>

            <!-- Subject & Day row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Subject selection -->
                <div class="space-y-2">
                    <label for="subject" class="text-sm font-semibold text-slate-300">Materi / Mata Pelajaran</label>
                    <select name="subject" id="subject" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                        <option value="">Pilih materi kuliah...</option>
                        @foreach($subjects as $subj)
                            <option value="{{ $subj['title'] }}">{{ $subj['title'] }}</option>
                        @endforeach
                        <option value="Umum">Umum / Lain-lain</option>
                    </select>
                </div>

                <!-- Day selection -->
                <div class="space-y-2">
                    <label for="day" class="text-sm font-semibold text-slate-300">Hari Belajar</label>
                    <select name="day" id="day" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-350 focus:outline-none focus:border-indigo-500 transition-colors">
                        <option value="">Pilih hari...</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
            </div>

            <!-- Time select row -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Start time -->
                <div class="space-y-2">
                    <label for="start_time" class="text-sm font-semibold text-slate-300">Jam Mulai</label>
                    <input type="time" name="start_time" id="start_time" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>

                <!-- End time -->
                <div class="space-y-2">
                    <label for="end_time" class="text-sm font-semibold text-slate-300">Jam Selesai</label>
                    <input type="time" name="end_time" id="end_time" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>
            </div>

            <!-- Priority Selector -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-300 block mb-1">Tingkat Prioritas</label>
                <div class="grid grid-cols-3 gap-3">
                    <label class="bg-slate-950 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 p-4 rounded-xl flex items-center justify-between cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                            <span class="text-sm font-semibold text-slate-200">High</span>
                        </div>
                        <input type="radio" name="priority" value="High" required class="accent-indigo-600">
                    </label>

                    <label class="bg-slate-950 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 p-4 rounded-xl flex items-center justify-between cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <span class="text-sm font-semibold text-slate-200">Medium</span>
                        </div>
                        <input type="radio" name="priority" value="Medium" required class="accent-indigo-600">
                    </label>

                    <label class="bg-slate-950 hover:bg-slate-900 border border-slate-800 hover:border-slate-700 p-4 rounded-xl flex items-center justify-between cursor-pointer transition-all">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-500"></span>
                            <span class="text-sm font-semibold text-slate-200">Low</span>
                        </div>
                        <input type="radio" name="priority" value="Low" required class="accent-indigo-600">
                    </label>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="text-sm font-semibold text-slate-300">Deskripsi / Catatan Tambahan (Opsional)</label>
                <textarea name="description" id="description" rows="4" placeholder="Detail topik belajar atau catatan persiapan kuis..." class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-4 border-t border-slate-850 justify-end">
                <a href="{{ route('jadwal') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 font-semibold text-sm transition-all duration-200 text-slate-300">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold text-sm transition-all duration-200 text-white shadow-lg shadow-indigo-600/30">
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
