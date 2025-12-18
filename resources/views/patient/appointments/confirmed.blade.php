<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Confirmación de Reserva') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="text-center mb-10">
                        <div class="rounded-full bg-green-100 p-4 inline-flex items-center justify-center mb-4">
                            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ __('¡Reserva Exitosa!') }}</h3>
                        <p class="text-gray-600 mt-2">{{ __('Su cita ha sido reservada y pagada correctamente.') }}</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 max-w-lg mx-auto border border-gray-200">
                        <div class="flex justify-between items-center border-b pb-4 mb-4">
                            <span class="text-gray-600">{{ __('Doctor') }}</span>
                            <span class="font-bold text-gray-900">{{ $appointment->doctor->user->name }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4 mb-4">
                            <span class="text-gray-600">{{ __('Especialidad') }}</span>
                            <span class="font-bold text-gray-900">{{ $appointment->doctor->specialty }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4 mb-4">
                            <span class="text-gray-600">{{ __('Fecha y Hora') }}</span>
                            <span class="font-bold text-gray-900">{{ $appointment->appointment_date }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-4 mb-4">
                            <span class="text-gray-600">{{ __('Monto Pagado') }}</span>
                            <span class="font-bold text-green-600">${{ $appointment->payment->amount }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">{{ __('Estado del Pago') }}</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                {{ __('PAGADO') }}
                            </span>
                        </div>
                    </div>

                    <div class="text-center mt-8">
                         <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-900 font-semibold">
                            &larr; {{ __('Volver al Panel') }}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
