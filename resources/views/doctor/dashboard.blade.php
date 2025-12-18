<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Doctor') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">{{ __('Sistema de Gestión') }}</h1>
                <h2 class="text-3xl font-bold text-blue-600">{{ __('Médica Moderna') }}</h2>
                <p class="text-gray-600 mt-2">{{ __('Bienvenido(a), Dr(a). ') }}{{ Auth::user()->name }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Pacientes') }}</p>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-green-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Citas Hoy') }}</p>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-purple-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Próximas') }}</p>
                    <p class="text-3xl font-bold text-gray-900">0</p>
                </div>

                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                    <div class="bg-orange-100 rounded-lg p-3 w-fit mb-4">
                        <svg class="h-8 w-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-sm font-semibold text-gray-600 mb-1">{{ __('Horarios') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Schedule::where('doctor_id', Auth::user()->doctor->id ?? 0)->count() }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="lg:col-span-2 bg-white rounded-xl shadow-md border border-gray-100 p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('Citas del Día') }}</h3>
                    <div class="text-center py-12">
                        <div class="bg-blue-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-10 w-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600 font-semibold">{{ __('No hay citas programadas') }}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ __('Las citas de hoy aparecerán aquí') }}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-600 rounded-xl shadow-lg p-6 text-white">
                        <h4 class="text-lg font-bold mb-3">{{ __('Mis Horarios') }}</h4>
                        <p class="text-sm text-blue-100 mb-4">{{ __('Configure su disponibilidad') }}</p>
                        <a href="{{ route('doctor.schedules.index') }}" class="block w-full bg-white text-blue-600 text-center py-3 rounded-lg font-semibold hover:bg-blue-50 transition">
                            {{ __('Gestionar Horarios') }}
                        </a>
                    </div>

                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">
                        <h4 class="font-bold text-gray-900 mb-4">{{ __('Acciones Rápidas') }}</h4>
                        <div class="space-y-3">
                            <button onclick="alert('Funcionalidad próximamente')" class="w-full flex items-center p-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ __('Ver Historial') }}</span>
                            </button>
                            <button onclick="alert('Funcionalidad próximamente')" class="w-full flex items-center p-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-semibold">{{ __('Reportes') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
