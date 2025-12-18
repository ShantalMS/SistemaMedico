<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seleccionar Horario') }} - Dr. {{ $doctor->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Citas disponibles para las próximas 2 semanas') }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($dates as $date)
                            <div class="border rounded-lg p-4 hover:bg-gray-50 transition duration-300">
                                <h4 class="font-bold text-lg mb-2">{{ \Carbon\Carbon::parse($date['date'])->isoFormat('dddd D') }}, {{ \Carbon\Carbon::parse($date['date'])->format('d/m') }}</h4>
                                <p class="text-gray-600 mb-2">
                                    {{ $date['start_time'] }} - {{ $date['end_time'] }}
                                </p>
                                <form action="{{ route('patient.appointments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                    <input type="hidden" name="schedule_id" value="{{ $date['schedule_id'] }}">
                                    <input type="hidden" name="appointment_date" value="{{ $date['date'] }} {{ $date['start_time'] }}">
                                    
                                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full mt-2">
                                        {{ __('Reservar Cita') }}
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="col-span-3 text-center text-gray-600">
                                <p>{{ __('No hay horarios disponibles para este doctor aún.') }}</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('patient.appointments.create') }}" class="text-blue-600 hover:text-blue-900">
                            &larr; {{ __('Volver a Doctores') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
