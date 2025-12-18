<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Administrativo') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ __('Sistema de Gestión') }}</h1>
                <h2 class="text-3xl font-bold text-blue-600">{{ __('Médica Moderna') }}</h2>
                <p class="text-gray-600 mt-2">{{ __('Panel de Administración') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Pacientes') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\User::where('role', 'patient')->count() }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-green-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Doctores') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Doctor::count() }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-orange-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Citas Pendientes') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Appointment::where('status', 'pending')->count() }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-red-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Pagos por Verificar') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Payment::where('status', 'en_verificacion')->count() }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md border border-gray-100 p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Pagos por Verificar') }}</h3>
                    
                    @php
                        $pendingPayments = \App\Models\Payment::where('status', 'en_verificacion')
                            ->with(['appointment.user'])
                            ->latest()
                            ->take(5)
                            ->get();
                    @endphp

                    @if($pendingPayments->count() > 0)
                        <div class="overflow-hidden rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">{{ __('Paciente') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">{{ __('Monto') }}</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($pendingPayments as $payment)
                                    <tr class="hover:bg-blue-50 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-gray-900">{{ $payment->appointment->user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $payment->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-bold text-gray-900">S/ {{ number_format($payment->amount, 2) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('admin.payments.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-blue-700 transition">
                                                {{ __('Revisar') }}
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="bg-green-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                                <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 font-semibold">{{ __('No hay pagos pendientes') }}</p>
                        </div>
                    @endif
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">
                        <h4 class="font-bold text-gray-900 mb-4">{{ __('Gestión Rápida') }}</h4>
                        <div class="space-y-3">
                            <a href="{{ route('admin.doctors.index') }}" class="flex items-center p-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ __('Gestionar Doctores') }}</span>
                            </a>

                            <a href="{{ route('admin.schedules.index') }}" class="flex items-center p-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ __('Gestionar Horarios') }}</span>
                            </a>

                            <a href="{{ route('admin.payments.index') }}" class="flex items-center p-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ __('Validar Pagos') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
