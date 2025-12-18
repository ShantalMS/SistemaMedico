<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-100 via-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <!-- Left Side - Illustration -->
                <div class="lg:w-1/2 bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-300 p-12 flex flex-col justify-center items-center text-white relative overflow-hidden">
                    <!-- Decorative circles -->
                    <div class="absolute top-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full -translate-x-32 -translate-y-32"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 bg-white opacity-10 rounded-full translate-x-32 translate-y-32"></div>
                    
                    <div class="relative z-10 text-center">
                        <!-- Medical Icon -->
                        <div class="mb-8">
                            <svg class="w-32 h-32 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        
                        <h2 class="text-3xl font-bold mb-4">Portal Hospital</h2>
                        <p class="text-lg text-white/90 leading-relaxed">
                            Estamos siempre enfocados en ayudar con tu salud y bienestar.
                        </p>
                    </div>
                </div>

                <!-- Right Side - Form -->
                <div class="lg:w-1/2 p-12">
                    <div class="max-w-md mx-auto">
                        <!-- Language Selector (Optional) -->
                        <div class="text-right mb-6">
                            <span class="text-sm text-gray-500">Español (ES)</span>
                        </div>

                        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Crear Cuenta</h2>

                        <!-- Social Login Buttons -->
                        <div class="space-y-3 mb-6">
                            <a href="{{ route('auth.google') }}" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl shadow-sm bg-white hover:bg-gray-50 transition duration-200">
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                                <span class="text-gray-700 font-medium">Registrarse con Google</span>
                            </a>
                        </div>

                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-gray-500">-O-</span>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="space-y-5">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Nombre Completo:')" class="text-gray-700 font-medium mb-2" />
                                <x-text-input id="name" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Juan Pérez" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email:')" class="text-gray-700 font-medium mb-2" />
                                <x-text-input id="email" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tu@email.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div>
                                <x-input-label for="password" :value="__('Contraseña:')" class="text-gray-700 font-medium mb-2" />
                                <x-text-input id="password" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña:')" class="text-gray-700 font-medium mb-2" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button class="w-full justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                                    {{ __('Crear Cuenta') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <p class="mt-6 text-center text-sm text-gray-600">
                            ¿Ya tienes una cuenta? 
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-800 transition">
                                Inicia sesión
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
