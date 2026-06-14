<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private function getMockSubjects()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Kalkulus & Aljabar',
                'category' => 'Matematika',
                'description' => 'Mempelajari limit, turunan, integral, dan aljabar linear beserta aplikasinya.',
                'chapters_count' => 12,
                'completed_chapters' => 8,
                'progress' => 67,
                'last_studied' => 'Turunan & Integral',
                'color' => 'indigo',
                'topics' => [
                    ['id' => 101, 'name' => 'Limit Fungsi & Kontinuitas', 'status' => 'completed', 'duration' => '2 jam'],
                    ['id' => 102, 'name' => 'Matriks & Aljabar Linear', 'status' => 'completed', 'duration' => '3 jam'],
                    ['id' => 103, 'name' => 'Turunan Fungsi Multivariabel', 'status' => 'in_progress', 'duration' => '4 jam'],
                    ['id' => 104, 'name' => 'Integral Tentu & Tak Tentu', 'status' => 'pending', 'duration' => '3 jam'],
                    ['id' => 105, 'name' => 'Aplikasi Turunan di Bidang Sains', 'status' => 'pending', 'duration' => '2.5 jam'],
                ]
            ],
            2 => [
                'id' => 2,
                'title' => 'Struktur Data & Algoritma',
                'category' => 'Ilmu Komputer',
                'description' => 'Pemahaman mengenai array, linked list, stack, queue, tree, graph, serta efisiensi algoritma (Big O).',
                'chapters_count' => 15,
                'completed_chapters' => 6,
                'progress' => 40,
                'last_studied' => 'Binary Search Tree',
                'color' => 'emerald',
                'topics' => [
                    ['id' => 201, 'name' => 'Array & Linked List', 'status' => 'completed', 'duration' => '2.5 jam'],
                    ['id' => 202, 'name' => 'Stack & Queue', 'status' => 'completed', 'duration' => '2 jam'],
                    ['id' => 203, 'name' => 'Tree & Binary Search Tree', 'status' => 'in_progress', 'duration' => '5 jam'],
                    ['id' => 204, 'name' => 'Graph & Shortest Path (Dijkstra)', 'status' => 'pending', 'duration' => '4 jam'],
                    ['id' => 205, 'name' => 'Sorting & Searching Algorithms', 'status' => 'pending', 'duration' => '3 jam'],
                ]
            ],
            3 => [
                'id' => 3,
                'title' => 'Genetika & Sel',
                'category' => 'Biologi',
                'description' => 'Membahas pembelahan sel, persilangan Mendel, mutasi DNA, dan rekayasa genetika modern.',
                'chapters_count' => 10,
                'completed_chapters' => 9,
                'progress' => 90,
                'last_studied' => 'Mutasi Genetik',
                'color' => 'amber',
                'topics' => [
                    ['id' => 301, 'name' => 'Pembelahan Sel (Mitosis & Meiosis)', 'status' => 'completed', 'duration' => '2 jam'],
                    ['id' => 302, 'name' => 'Persilangan Mendel & Epistatis', 'status' => 'completed', 'duration' => '3.5 jam'],
                    ['id' => 303, 'name' => 'Mutasi Genetik & DNA Recombinant', 'status' => 'completed', 'duration' => '3 jam'],
                    ['id' => 304, 'name' => 'Etika Rekayasa Genetika', 'status' => 'in_progress', 'duration' => '2 jam'],
                ]
            ],
            4 => [
                'id' => 4,
                'title' => 'Mekanika Klasik',
                'category' => 'Fisika',
                'description' => 'Dasar kinematika, dinamika partikel, usaha dan energi, serta momentum linear.',
                'chapters_count' => 8,
                'completed_chapters' => 1,
                'progress' => 12,
                'last_studied' => 'Hukum Newton',
                'color' => 'rose',
                'topics' => [
                    ['id' => 401, 'name' => 'Vektor & Gerak Lurus', 'status' => 'completed', 'duration' => '2 jam'],
                    ['id' => 402, 'name' => 'Hukum Newton & Gaya Gesek', 'status' => 'in_progress', 'duration' => '3.5 jam'],
                    ['id' => 403, 'name' => 'Usaha, Energi, & Hukum Kekekalan', 'status' => 'pending', 'duration' => '4 jam'],
                ]
            ]
        ];
    }

    public function index()
    {
        $subjects = $this->getMockSubjects();
        $user = auth()->user() ?? (object)[
            'name' => 'Azizi',
            'email' => 'azizi@panicstudy.com'
        ];

        // Mock stats
        $stats = [
            'weekly_hours' => 18.5,
            'completed_tasks' => 15,
            'total_tasks' => 22,
            'today_tasks_count' => 3,
            'streak' => 7,
            'completion_rate' => 68,
        ];

        // Mock active tasks / planners
        $tasks = [
            (object)[
                'id' => 1,
                'title' => 'Review Turunan Kalkulus',
                'subject' => 'Kalkulus & Aljabar',
                'priority' => 'high',
                'due_date' => 'Hari Ini',
                'due_time' => '10:00',
                'status' => 'pending'
            ],
            (object)[
                'id' => 2,
                'title' => 'Implementasi BST di Python',
                'subject' => 'Struktur Data & Algoritma',
                'priority' => 'medium',
                'due_date' => 'Hari Ini',
                'due_time' => '15:00',
                'status' => 'pending'
            ],
            (object)[
                'id' => 3,
                'title' => 'Kerjakan Latihan Soal Fisika',
                'subject' => 'Mekanika Klasik',
                'priority' => 'low',
                'due_date' => 'Besok',
                'due_time' => '09:00',
                'status' => 'pending'
            ],
        ];

        // Today's schedule
        $schedule = [
            ['time' => '08:00 - 10:00', 'activity' => 'Belajar Kalkulus (Bab Turunan)', 'subject' => 'Matematika', 'type' => 'Belajar Mandiri', 'color' => 'indigo'],
            ['time' => '13:00 - 15:00', 'activity' => 'Sesi Koding (Binary Search Tree)', 'subject' => 'Ilmu Komputer', 'type' => 'Praktek', 'color' => 'emerald'],
            ['time' => '19:30 - 21:00', 'activity' => 'Review Hukum Newton & Soal', 'subject' => 'Fisika', 'type' => 'Latihan Soal', 'color' => 'rose'],
        ];

        return view('dashboard', compact('user', 'stats', 'tasks', 'schedule', 'subjects'));
    }

    public function materi()
    {
        $subjects = $this->getMockSubjects();
        return view('materi', compact('subjects'));
    }

    public function detailMateri($id)
    {
        $subjects = $this->getMockSubjects();
        $subject = $subjects[$id] ?? abort(404, 'Materi tidak ditemukan');

        return view('detail-materi', compact('subject'));
    }

    public function jadwal()
    {
        $schedule = [
            'Senin' => [
                ['time' => '08:00 - 10:00', 'activity' => 'Belajar Kalkulus (Bab Turunan)', 'subject' => 'Kalkulus & Aljabar', 'priority' => 'High', 'color' => 'indigo'],
                ['time' => '13:00 - 15:00', 'activity' => 'Sesi Koding (Binary Search Tree)', 'subject' => 'Struktur Data & Algoritma', 'priority' => 'Medium', 'color' => 'emerald'],
            ],
            'Selasa' => [
                ['time' => '09:00 - 11:30', 'activity' => 'Pembelahan Sel Mitosis', 'subject' => 'Genetika & Sel', 'priority' => 'Medium', 'color' => 'amber'],
                ['time' => '14:00 - 16:00', 'activity' => 'Latihan Soal Limit Fungsi', 'subject' => 'Kalkulus & Aljabar', 'priority' => 'High', 'color' => 'indigo'],
            ],
            'Rabu' => [
                ['time' => '10:00 - 12:00', 'activity' => 'Struktur Data Graph & Shortest Path', 'subject' => 'Struktur Data & Algoritma', 'priority' => 'High', 'color' => 'emerald'],
                ['time' => '19:30 - 21:00', 'activity' => 'Review Hukum Newton & Soal', 'subject' => 'Mekanika Klasik', 'priority' => 'Low', 'color' => 'rose'],
            ],
            'Kamis' => [
                ['time' => '08:00 - 10:00', 'activity' => 'Persilangan Mendel & Hukum Mendel', 'subject' => 'Genetika & Sel', 'priority' => 'High', 'color' => 'amber'],
                ['time' => '13:00 - 15:00', 'activity' => 'Evaluasi Koding sorting algorithms', 'subject' => 'Struktur Data & Algoritma', 'priority' => 'Medium', 'color' => 'emerald'],
            ],
            'Jumat' => [
                ['time' => '09:00 - 11:00', 'activity' => 'Fisika Dinamika Partikel', 'subject' => 'Mekanika Klasik', 'priority' => 'Medium', 'color' => 'rose'],
                ['time' => '15:30 - 17:00', 'activity' => 'Kuis Mandiri Matematika', 'subject' => 'Kalkulus & Aljabar', 'priority' => 'High', 'color' => 'indigo'],
            ],
            'Sabtu' => [
                ['time' => '10:00 - 12:00', 'activity' => 'Review Mingguan & Perencanaan', 'subject' => 'Umum', 'priority' => 'Low', 'color' => 'slate'],
            ],
            'Minggu' => []
        ];

        return view('jadwal', compact('schedule'));
    }

    public function tambahJadwal()
    {
        $subjects = $this->getMockSubjects();
        return view('tambah-jadwal', compact('subjects'));
    }

    public function simpanJadwal(Request $request)
    {
        // Simple mock behavior: redirect back with success message
        return redirect()->route('jadwal')->with('success', 'Jadwal baru berhasil ditambahkan!');
    }

    public function latihan()
    {
        $quizzes = [
            ['id' => 1, 'title' => 'Kuis Turunan Fungsi', 'subject' => 'Kalkulus & Aljabar', 'questions_count' => 15, 'duration' => '30 menit', 'difficulty' => 'Sedang', 'status' => 'completed', 'best_score' => 90, 'color' => 'indigo'],
            ['id' => 2, 'title' => 'Tantangan Coding: Stack & Queue', 'subject' => 'Struktur Data & Algoritma', 'questions_count' => 5, 'duration' => '45 menit', 'difficulty' => 'Sulit', 'status' => 'completed', 'best_score' => 100, 'color' => 'emerald'],
            ['id' => 3, 'title' => 'Latihan Genetika & Hukum Mendel', 'subject' => 'Genetika & Sel', 'questions_count' => 20, 'duration' => '40 menit', 'difficulty' => 'Mudah', 'status' => 'not_started', 'best_score' => null, 'color' => 'amber'],
            ['id' => 4, 'title' => 'Kuis Dinamika Partikel & Gaya Gesek', 'subject' => 'Mekanika Klasik', 'questions_count' => 10, 'duration' => '25 menit', 'difficulty' => 'Sedang', 'status' => 'not_started', 'best_score' => null, 'color' => 'rose'],
        ];

        return view('latihan', compact('quizzes'));
    }

    public function progress()
    {
        $weeklyHours = [
            'Senin' => 3.5,
            'Selasa' => 4.5,
            'Rabu' => 2.0,
            'Kamis' => 5.0,
            'Jumat' => 4.0,
            'Sabtu' => 3.0,
            'Minggu' => 1.0
        ];

        $subjectProgress = [
            ['name' => 'Kalkulus & Aljabar', 'percentage' => 67, 'color' => 'indigo', 'completed' => 8, 'total' => 12],
            ['name' => 'Struktur Data & Algoritma', 'percentage' => 40, 'color' => 'emerald', 'completed' => 6, 'total' => 15],
            ['name' => 'Genetika & Sel', 'percentage' => 90, 'color' => 'amber', 'completed' => 9, 'total' => 10],
            ['name' => 'Mekanika Klasik', 'percentage' => 12, 'color' => 'rose', 'completed' => 1, 'total' => 8],
        ];

        $recentActivities = [
            ['time' => '1 jam yang lalu', 'description' => 'Menyelesaikan topik "Binary Search Tree" di Struktur Data & Algoritma', 'icon' => 'check-circle', 'color' => 'emerald'],
            ['time' => 'Kemarin', 'description' => 'Mengerjakan kuis "Kuis Turunan Fungsi" dengan skor 90/100', 'icon' => 'academic-cap', 'color' => 'indigo'],
            ['time' => '2 hari yang lalu', 'description' => 'Menambahkan jadwal belajar baru untuk Mekanika Klasik', 'icon' => 'calendar', 'color' => 'rose'],
            ['time' => '4 hari yang lalu', 'description' => 'Menyelesaikan topik "Persilangan Mendel & Epistatis" di Genetika & Sel', 'icon' => 'check-circle', 'color' => 'amber'],
        ];

        return view('progress', compact('weeklyHours', 'subjectProgress', 'recentActivities'));
    }

    public function profil()
    {
        $user = auth()->user() ?? (object)[
            'name' => 'Azizi',
            'email' => 'azizi@panicstudy.com',
            'created_at' => now()->subDays(30),
        ];

        $goals = [
            ['title' => 'Konsistensi Belajar Harian', 'target' => 'Minimal 3 jam per hari', 'achieved' => '7/7 hari tercapai minggu ini', 'progress' => 100],
            ['title' => 'Penyelesaian Topik Kuliah', 'target' => 'Selesaikan 5 topik baru', 'achieved' => '4/5 topik selesai', 'progress' => 80],
            ['title' => 'Skor Kuis Rata-rata', 'target' => 'Skor minimal 80', 'achieved' => 'Rata-rata 95', 'progress' => 100],
        ];

        $achievements = [
            ['title' => 'Early Bird', 'description' => 'Mulai belajar sebelum jam 7 pagi 3 hari berturut-turut.', 'unlocked' => true, 'icon' => 'sun'],
            ['title' => 'Code Warrior', 'description' => 'Menyelesaikan latihan coding struktur data dengan skor sempurna.', 'unlocked' => true, 'icon' => 'code'],
            ['title' => 'Unstoppable Streak', 'description' => 'Mencapai streak belajar 7 hari berturut-turut.', 'unlocked' => true, 'icon' => 'fire'],
            ['title' => 'Master Plan', 'description' => 'Menyelesaikan 10 jadwal belajar berturut-turut tanpa tertunda.', 'unlocked' => false, 'icon' => 'clipboard-check'],
        ];

        return view('profil', compact('user', 'goals', 'achievements'));
    }
}
