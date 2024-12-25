@extends('base')
@section('title', 'Inscription')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-700 text-center">Créer un compte</h2>
        <form action="{{ route('app_register') }}" method="POST" class="mt-6">
            @csrf

            <!-- Prénom et Nom -->
            <div class="flex space-x-4">
                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="text"
                        name="prenom"
                        id="prenom"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="prenom"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Prénom
                    </label>
                    @error('prenom')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="nom"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Nom
                    </label>
                    @error('nom')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="relative z-0 mb-6 w-full group">
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                    placeholder=" " required />
                <label
                    for="email"
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                    Email
                </label>
                @error('email')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <!-- Adresse et Numéro de téléphone -->
            <div class="flex space-x-4">
                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="address"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Adresse
                    </label>
                    @error('address')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="tel"
                        name="phone"
                        id="phone"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="phone"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Numéro
                    </label>
                    @error('phone')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <!-- Profession -->
            <div class="relative z-0 mb-6 w-full group">
                <input
                    type="text"
                    name="profession"
                    id="profession"
                    class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                    placeholder=" " required />
                <label
                    for="profession"
                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                    Profession
                </label>
                @error('profession')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <!-- Mot de passe et Confirmation -->
            <div class="flex space-x-4">
                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="password"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Mot de passe
                    </label>
                    @error('password')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-1/2 group">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="peer block w-full px-2.5 pb-2.5 pt-4 text-sm text-gray-900 bg-transparent border-2 border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                        placeholder=" " required />
                    <label
                        for="password_confirmation"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-placeholder-shown:translate-y-2.5 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-4 left-2">
                        Confirmer le mot de passe
                    </label>
                </div>
            </div>

            <!-- Bouton de soumission -->
            <button
                type="submit"
                class="w-full px-4 py-2 text-white bg-gray-800 hover:bg-gray-700 focus:ring-gray-300 rounded-lg font-semibold">
                S'inscrire
            </button>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-500">
                    Vous avez deja un compte ? <a href="{{ route('app_login_form') }}" class="text-gray-500 hover:underline">Connectez-vous !</a>
                </p>
            </div>

        </form>
    </div>
</div>
@endsection
