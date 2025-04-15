<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pelatihan Badminton') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Data Sesi Pelatihan</h3>
                    <ul>
                        @foreach ($trainings as $training)
                            <li>
                                {{ $training->name }} 
                                <a href="{{ route('trainings.show', $training->id) }}" class="text-blue-500">[Lihat]</a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('trainings.index') }}" class="text-green-500">List of Training Sessions</a>

                    <h3>Data Peserta</h3>
                    <ul>
                        @foreach ($participants as $participant)
                            <li>
                                {{ $participant->name }} 
                                <a href="{{ route('participants.show', $participant->id) }}" class="text-blue-500">[Lihat]</a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('participants.index') }}" class="text-green-500">List of Participants</a>

                    <h3>Data Pendaftaran</h3>
                    <ul>
                        @foreach ($registrations as $registration)
                            <li>
                                {{ $registration->user->name }} - {{ $registration->session->name }}
                                <a href="{{ route('registrations.show', $registration->id) }}" class="text-blue-500">[Lihat]</a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('registrations.index') }}" class="text-green-500">List of Registrations</a>

                    <h3>Data Pembayaran</h3>
                    <ul>
                        @foreach ($payments as $payment)
                            <li>
                                {{ $payment->user->name }} - Rp{{ number_format($payment->total_payments, 0, ',', '.') }}
                                <a href="{{ route('payments.show', $payment->id) }}" class="text-blue-500">[Lihat]</a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('payments.index') }}" class="text-green-500">List of Payments</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
