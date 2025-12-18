<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitar Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Seleccione un Doctor') }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($doctors as $doctor)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition duration-300">
                                <h4 class="font-bold text-xl mb-2">{{ $doctor->user->name }}</h4>
                                <p class="text-gray-600 mb-2">{{ $doctor->specialty }}</p>
                                <p class="text-gray-800 font-semibold mb-4">${{ $doctor->consultation_price }}</p>
                                <a href="{{ route('patient.appointments.schedule', $doctor->id) }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                    {{ __('Seleccionar Doctor') }}
                                </a>
                            </div>
                        @endforeach
                    </div>

                    @if($doctors->isEmpty())
                        <p class="text-gray-600">{{ __('No hay doctores disponibles por el momento.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
