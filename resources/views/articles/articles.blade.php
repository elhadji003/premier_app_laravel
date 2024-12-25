@extends('base')

@section('title', 'Mes articles')

@section('content')
<x-navbar/>

<div class="max-w-4xl mx-auto mt-8 p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Mes articles</h1>

    <!-- Formulaire de recherche -->
    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('articles.list') }}" method="GET" class="flex items-center w-full">
            <input 
                type="text" 
                name="search" 
                value="{{ old('search', $search ?? '') }}" 
                placeholder="Chercher un article" 
                class="border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2"
            >
            <button 
                type="submit" 
                class="ml-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                Rechercher
            </button>
        </form>
        <a 
            href="{{ route('articles.create') }}" 
            class="ml-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 text-nowrap">
            Créer un article
        </a>
    </div>

    <!-- Liste des articles -->
    @if ($articles && $articles->isNotEmpty())
        <div class="space-y-6">
            @foreach ($articles as $article)
                <div class="border border-gray-300 rounded-lg p-4 bg-white shadow-md mt-3">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $article->content }}</p>

                    <!-- Afficher les utilisateurs qui ont aimé l'article -->
                    <div class="mb-4">
                        <h3 class="text-gray-800 font-semibold">Utilisateurs qui ont aimé cet article :</h3>
                        <ul>
                            @foreach ($article->likedBy as $user)
                                <li>{{ $user->prenom }} {{ $user->nom }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:underline font-medium">Modifier</a>
                        <form action="{{ route('articles.delete', $article->id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-red-500 hover:underline font-medium"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @else
        <div class="text-center">
            @if (request('search'))
                <p class="text-gray-600 text-lg mb-4">Aucun article ne correspond à votre recherche.</p>
            @else
                <p class="text-gray-600 text-lg mb-4">Vous n'avez pas encore créé d'article.</p>
            @endif
            <a 
                href="{{ route('articles.create') }}" 
                class="inline-block bg-blue-500 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-600">
                Créer des articles
            </a>
        </div>
    @endif
</div>
@endsection
