<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Badminton Training</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chart.js untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar Admin -->
        <aside class="bg-white w-72 shadow-lg flex flex-col">
            <div class="p-6 text-center border-b">
                <img src="badminton-logo.png" alt="Logo" class="w-24 mx-auto mb-2" />
                <h1 class="text-2xl font-bold text-orange-600">Admin Panel</h1>
            </div>
            <nav class="flex-1 mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 {{ request()->routeIs('admin.dashboard') ? 'bg-orange-100 font-semibold' : '' }}">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('admin.coaches.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 {{ request()->routeIs('admin.coaches.*') ? 'bg-orange-100 font-semibold' : '' }}">
                    <span class="mr-3">🏆</span> Coaches
                </a>
                <a href="{{ route('admin.schedules.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 {{ request()->routeIs('admin.schedules.*') ? 'bg-orange-100 font-semibold' : '' }}">
                    <span class="mr-3">📅</span> Schedules
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 {{ request()->routeIs('admin.bookings.*') ? 'bg-orange-100 font-semibold' : '' }}">
                    <span class="mr-3">📊</span> Bookings
                </a>
                <a href="{{ route('admin.payments.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 {{ request()->routeIs('admin.payments.*') ? 'bg-orange-100 font-semibold' : '' }}">
                    <span class="mr-3">💳</span> Payments
                </a>
            </nav>
            <div class="p-6 border-t">
                <button class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Logout</button>
            </div>
        </aside>

        <!-- Main Content Admin -->
        <main class="flex-1 p-6 overflow-y-auto">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Admin Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <div class="text-gray-600">Hai, <span class="font-semibold">{{ auth()->user()->name ?? 'Admin' }}</span></div>
                    <img src="profile-placeholder.png" alt="Profile" class="w-12 h-12 rounded-full border border-gray-300" />
                </div>
            </header>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Total Coaches</h3>
                    <p class="text-3xl font-bold mt-1">{{ $coachesCount ?? '0' }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Upcoming Schedules</h3>
                    <p class="text-3xl font-bold mt-1">{{ $upcomingSchedulesCount ?? '0' }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Payments Pending</h3>
                    <p class="text-3xl font-bold mt-1">{{ $pendingPaymentsCount ?? '0' }}</p>
                </div>
            </div>

            <!-- Charts and Latest Schedules -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Skill Progress Chart -->
                <section class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-4">Skill Progress Overview</h3>
                    <canvas id="skillChart" class="w-full h-64"></canvas>
                </section>

                <!-- Latest Schedules -->
                <section class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-4">Latest Training Schedules</h3>
                    <ul class="divide-y divide-gray-200">
                        @foreach ($latestSchedules ?? [] as $schedule)
                        <li class="py-3 flex justify-between items-center">
                            <div>
                                <p class="font-medium">{{ $schedule->title ?? 'Latihan' }}</p>
                                <p class="text-sm text-gray-500">{{ $schedule->date->format('d M Y') }} • {{ $schedule->start_time }}-{{ $schedule->end_time }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-sm {{ $schedule->status == 'upcoming' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($schedule->status ?? 'Selesai') }}
                            </span>
                        </li>
                        @endforeach
                        @if(empty($latestSchedules))
                            <li class="py-3 text-gray-500 text-center">Tidak ada jadwal terbaru.</li>
                        @endif
                    </ul>
                </section>
            </div>
        </main>
    </div>

    <script>
        const ctx = document.getElementById('skillChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Tingkat Skill Rata-rata',
                    data: [45, 55, 60, 65, 70, 75],
                    borderColor: '#f97316',
                    tension: 0.4,
                    fill: false,
                    pointBackgroundColor: '#f97316',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
