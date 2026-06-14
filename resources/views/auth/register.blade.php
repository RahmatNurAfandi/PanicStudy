<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - PanicStudy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <!-- Fallback Tailwind CSS integration via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Outfit', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-2xl p-8 space-y-6 relative overflow-hidden shadow-2xl shadow-indigo-950/20">
        <!-- Glowing background effects -->
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/5 to-transparent pointer-events-none"></div>
        <div class="absolute -top-20 -right-20 w-44 h-44 bg-indigo-500/5 blur-3xl rounded-full"></div>
        
        <!-- Header -->
        <div class="text-center space-y-2 relative">
            <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center shadow-lg shadow-indigo-600/30 mx-auto">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight text-white pt-2">Buat Akun Baru</h1>
            <p class="text-xs text-slate-400">Bergabunglah dan atur target serta jadwal belajarmu hari ini.</p>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-rose-950/40 border border-rose-500/30 text-rose-450 p-4 rounded-xl space-y-1">
                @foreach ($errors->all() as $error)
                    <p class="text-xs font-semibold">⚠️ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('register') }}" method="POST" class="space-y-4 relative">
            @csrf
            
            <!-- Full Name -->
            <div class="space-y-1.5">
                <label for="name" class="text-xs font-semibold text-slate-350 tracking-wide">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="Nama Anda" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>
            </div>

            <!-- Email -->
            <div class="space-y-1.5">
                <label for="email" class="text-xs font-semibold text-slate-350 tracking-wide">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                        </svg>
                    </span>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="nama@email.com" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <label for="password" class="text-xs font-semibold text-slate-350 tracking-wide">Password (Min. 8 Karakter)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input type="password" name="password" id="password" required placeholder="••••••••" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1.5">
                <label for="password_confirmation" class="text-xs font-semibold text-slate-350 tracking-wide">Ulangi Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </span>
                    <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="••••••••" class="w-full bg-slate-950 border border-slate-800 rounded-xl pl-10 pr-4 py-3 text-sm text-slate-200 placeholder-slate-650 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="w-full py-3.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 font-semibold text-sm transition-all duration-200 text-white shadow-lg shadow-indigo-600/30">
                Daftar Akun Baru
            </button>
        </form>

        <!-- Redirect link -->
        <p class="text-center text-xs text-slate-500 relative">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="text-indigo-400 font-bold hover:text-indigo-300 transition-colors underline underline-offset-4 pl-1">Masuk Sekarang</a>
        </p>
    </div>
</body>
</html>
