<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Pago') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Instructions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">{{ __('Instrucciones de Pago') }}</h3>
                    
                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                             <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center font-bold mr-3">Y</div>
                             <h4 class="font-bold text-gray-800">{{ __('Opción 1: YAPE') }}</h4>
                        </div>
                        <div class="ml-11 bg-purple-50 p-4 rounded-lg border border-purple-100">
                            <p class="text-sm text-gray-600">{{ __('Realice el yapeo al número:') }}</p>
                            <p class="text-2xl font-bold text-gray-900 my-1">925 269 405</p>
                            <p class="text-xs text-gray-500">{{ __('A nombre de: Consultorio') }}</p>
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                             <div class="w-8 h-8 rounded-full bg-orange-500 text-white flex items-center justify-center font-bold mr-3">B</div>
                             <h4 class="font-bold text-gray-800">{{ __('Opción 2: Transferencia BCP') }}</h4>
                        </div>
                        <div class="ml-11 bg-orange-50 p-4 rounded-lg border border-orange-100">
                            <p class="text-sm text-gray-600">{{ __('Cuenta de Ahorros (Soles):') }}</p>
                            <p class="text-lg font-bold text-gray-900 mb-2">255-02430766-0-55</p>
                            
                            <p class="text-sm text-gray-600">{{ __('Cuenta Interbancaria (CCI):') }}</p>
                            <p class="text-lg font-bold text-gray-900">002-255-102430766055-84</p>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded text-blue-800 text-sm">
                        <strong>{{ __('Importante:') }}</strong> {{ __('Guarde la captura de pantalla de su pago, la necesitará para registrarlo en el siguiente paso.') }}
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">{{ __('Datos del Pago') }}</h3>

                    <div class="bg-gray-50 p-3 rounded mb-6 flex justify-between items-center text-sm">
                        <span>{{ __('Monto a Pagar:') }}</span>
                        <span class="text-xl font-bold text-gray-900">${{ $payment->amount }}</span>
                    </div>

                    <form action="{{ route('patient.payments.register', $payment) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <x-input-label for="payment_method" :value="__('Método de Pago')" />
                            <select id="payment_method" name="payment_method" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">{{ __('Seleccione...') }}</option>
                                <option value="yape">{{ __('Yape') }}</option>
                                <option value="bcp">{{ __('Transferencia BCP') }}</option>
                            </select>
                            <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="operation_number" :value="__('Número de Operación')" />
                            <x-text-input id="operation_number" class="block mt-1 w-full" type="text" name="operation_number" :value="old('operation_number')" required placeholder="Ej: 12345678" />
                            <x-input-error :messages="$errors->get('operation_number')" class="mt-2" />
                        </div>

                         <div class="mb-4">
                            <x-input-label for="payment_date" :value="__('Fecha del Pago')" />
                            <x-text-input id="payment_date" class="block mt-1 w-full" type="date" name="payment_date" :value="old('payment_date', now()->format('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('payment_date')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="payment_proof" :value="__('Comprobante (Imagen/Captura)')" />
                            <input id="payment_proof" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file" name="payment_proof" accept="image/*" required>
                            <p class="mt-1 text-xs text-gray-500">{{ __('Formatos: JPG, PNG. Máx: 2MB') }}</p>
                            <x-input-error :messages="$errors->get('payment_proof')" class="mt-2" />
                        </div>

                        <div class="flex justify-end">
                             <a href="{{ route('patient.payments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button>
                                {{ __('Enviar Pago') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
