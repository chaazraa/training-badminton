<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badminton Training Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js untuk progress grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-white w-64 shadow-lg">
            <div class="p-4 text-center">
                <img src="badminton-logo.png" alt="Logo" class="w-20 mx-auto">
                <h2 class="text-xl font-bold mt-2">Smash Training</h2>
            </div>
            <nav class="mt-4">              
                        <a href="{{ route('user.dashboard') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-orange-50 {{ request()->routeIs('user.dashboard') ? 'bg-orange-50 text-gray-700' : '' }}">
                            <span class="mx-2">🏸</span>
                            Dashboard
                        </a>
                        <a href="{{ route('user.haloschedules.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-orange-50 {{ request()->routeIs('user.schedules.*') ? 'bg-orange-50 text-gray-700' : '' }}">
                            <span class="mx-2">📅</span>
                            Schedule
                        </a>
                        <a href="{{ route('user.bookings.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-orange-50 {{ request()->routeIs('user.bookings.*') ? 'bg-orange-50 text-gray-700' : '' }}">
                            <span class="mx-2">📊</span>
                            Booking
                        </a>
                        <a href="{{ route('user.coaches.index') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-orange-50 {{ request()->routeIs('user.coaches.*') ? 'bg-orange-50 text-gray-700' : '' }}">
                            <span class="mx-2">🏆</span>
                            Coach
                        </a>
                </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Header -->
            <header class="flex items-center justify-between p-4 bg-white shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Selamat Latihan, <span class="text-orange-500">[Nama User]</span>!</h1>
                    <p class="text-sm text-gray-500">Total sesi latihan bulan ini: 12 sesi</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                        🏸 Book Session
                    </button>
                    <img src="profile-placeholder.png" alt="Profile" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-full">
                            <span class="text-2xl">🏆</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Level Skill</h3>
                            <p class="text-2xl font-bold mt-1">Intermediate</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <span class="text-2xl">⏱️</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Total Latihan</h3>
                            <p class="text-2xl font-bold mt-1">58 Jam</p>
                        </div>
                    </div>
                </div>

                      <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-full">
                            <span class="text-2xl">🏸</span> <!-- ikon shuttlecock -->
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Jumlah Smash</h3>
                            <p class="text-2xl font-bold mt-1">1,234 Smash</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <span class="text-2xl">📅</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Sesi Selanjutnya</h3>
                            <p class="text-2xl font-bold mt-1">2 Hari</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Chart dan Jadwal -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
                <!-- Progress Chart -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4">Perkembangan Skill</h2>
                    <canvas id="skillChart" class="w-full h-64"></canvas>
                </div>

                <!-- Jadwal Latihan -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4">Jadwal Latihan</h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-orange-50 rounded">
                            <div>
                                <p class="font-medium">Latihan Footwork</p>
                                <p class="text-sm text-gray-500">15 Sept 2023 • 16:00-18:00</p>
                            </div>
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm">Akan datang</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                            <div>
                                <p class="font-medium">Latihan Smash</p>
                                <p class="text-sm text-gray-500">13 Sept 2023 • 16:00-18:00</p>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">Selesai</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leaderboard dan Pencapaian -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
                <!-- Leaderboard -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4">Leaderboard Klub</h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-50">
                            <div class="flex items-center">
                                <span class="text-yellow-500 mr-2">🥇</span>
                                <span>Andi Pratama</span>
                            </div>
                            <span class="text-orange-500">950 Poin</span>
                        </div>
                        <div class="flex items-center justify-between p-2 hover:bg-gray-50">
                            <div class="flex items-center">
                                <span class="text-gray-400 mr-2">🥈</span>
                                <span>Budi Santoso</span>
                            </div>
                            <span class="text-orange-500">875 Poin</span>
                        </div>
                        <div class="flex items-center justify-between p-2 hover:bg-gray-50">
                            <div class="flex items-center">
                                <span class="text-amber-700 mr-2">🥉</span>
                                <span>Kamu</span>
                            </div>
                            <span class="text-orange-500">820 Poin</span>
                        </div>
                    </div>
                </div>

                <!-- Pencapaian Terbaru -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4">Pencapaian Terbaru</h2>
                    <div class="flex items-center space-x-4">
                        <div class="bg-orange-100 p-3 rounded-full">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div>
                            <p class="font-medium">Akurasi Smash Meningkat 25%</p>
                            <p class="text-sm text-gray-500">Dicapai pada 12 Sept 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sample chart untuk progress skill
        const ctx = document.getElementById('skillChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Tingkat Skill',
                    data: [45, 55, 60, 65, 70, 75],
                    borderColor: '#f97316',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>