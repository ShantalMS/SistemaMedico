<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Paciente') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ __('Sistema de Gestión') }}</h1>
                <h2 class="text-3xl font-bold text-blue-600">{{ __('Médica Moderna') }}</h2>
                <p class="text-gray-600 mt-2">{{ __('Bienvenido(a), ') }}{{ Auth::user()->name }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-blue-100 rounded-lg p-3">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">{{ __('Gestión de Citas') }}</h3>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                    <p class="text-sm text-gray-500 mt-2">{{ __('Agende y administre citas médicas de forma eficiente') }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-green-100 rounded-lg p-3">
                            <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">{{ __('Pagos Seguros') }}</h3>
                    <p class="text-3xl font-bold text-gray-900">S/ 0</p>
                    <p class="text-sm text-gray-500 mt-2">{{ __('Sistema de pagos con verificación administrativa') }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-100 rounded-lg p-3">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-600 mb-1">{{ __('Panel Administrativo') }}</h3>
                    <p class="text-3xl font-bold text-gray-900">--</p>
                    <p class="text-sm text-gray-500 mt-2">{{ __('Control total del sistema hospitalario') }}</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Acciones Rápidas') }}</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('patient.appointments.create') }}" class="block p-6 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all shadow-md hover:shadow-lg">
                        <div class="flex items-center mb-3">
                            <div class="bg-white/20 rounded-lg p-2 mr-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold">{{ __('Solicitar Cita') }}</h4>
                        </div>
                        <p class="text-sm text-blue-100">{{ __('Agendar consulta médica') }}</p>
                    </a>

                    <button onclick="alert('Funcionalidad próximamente')" class="block p-6 bg-white border-2 border-blue-600 text-blue-600 rounded-xl hover:bg-blue-50 transition-all shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 rounded-lg p-2 mr-3">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold">{{ __('Mis Citas') }}</h4>
                        </div>
                        <p class="text-sm text-gray-600">{{ __('Ver historial completo') }}</p>
                    </button>

                    <a href="{{ route('patient.payments.index') }}" class="block p-6 bg-white border-2 border-blue-600 text-blue-600 rounded-xl hover:bg-blue-50 transition-all shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-100 rounded-lg p-2 mr-3">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold">{{ __('Pagos') }}</h4>
                        </div>
                        <p class="text-sm text-gray-600">{{ __('Gestionar pagos') }}</p>
                    </a>
                </div>
            </div>

            <div class="bg-blue-600 rounded-xl shadow-lg p-8 text-white text-center">
                <h3 class="text-2xl font-bold mb-3">{{ __('¿Listo para comenzar?') }}</h3>
                <p class="text-blue-100 mb-6">{{ __('Únase a nuestro sistema de gestión médica moderna') }}</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('patient.appointments.create') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition">
                        {{ __('Agendar Cita') }}
                    </a>
                    <button class="bg-blue-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-900 transition border-2 border-blue-500">
                        {{ __('Contactar Soporte') }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
