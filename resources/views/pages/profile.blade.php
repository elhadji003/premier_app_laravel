@extends('base')
@section('title', 'Mon Profil')

@section('content')
<x-navbar/>

<div class="container mx-auto p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- En-tête du Profil avec Image ou Initiales -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 text-center">
            <h2 class="text-4xl font-semibold text-white">Mon Profil</h2>
            <p class="text-lg text-white mt-2">Gestion de vos informations personnelles</p>
        </div>

        <!-- Corps de la page avec les informations de l'utilisateur -->
        <div class="p-8 bg-gray-50">
            <!-- Affichage du message de succès, si présent -->
            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Informations du profil -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Nom complet -->
                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Nom complet</h3>
                    <p class="text-gray-600">{{ $user->prenom }} {{ $user->nom }}</p>
                </div>

                <!-- Email -->
                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Email</h3>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>

                <!-- Adresse -->
                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Adresse</h3>
                    <p class="text-gray-600">{{ $user->address }}</p>
                </div>

                <!-- Téléphone -->
                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Téléphone</h3>
                    <p class="text-gray-600">{{ $user->phone }}</p>
                </div>

                <!-- Profession -->
                <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200">
                    <h3 class="text-xl font-medium text-gray-800">Profession</h3>
                    <p class="text-gray-600">{{ $user->profession }}</p>
                </div>
            </div>

            <!-- Bouton de modification -->
            <div class="mt-8 text-center">
                <a href="{{ route('profile.edit') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Modifier mon profil
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
