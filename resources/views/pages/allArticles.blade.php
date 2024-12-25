@extends('base')

@section('title', 'tous les articles')

@section('content')
<x-navbar />

<div class="max-w-4xl mx-auto mt-8 p-4">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Les articles</h1>

    <!-- Formulaire de recherche -->
    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('articles.all') }}" method="GET" class="flex items-center w-full">
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
    </div>

    <!-- Liste des articles -->
    @if ($articles && $articles->isNotEmpty())
        <div class="space-y-6">
            @foreach ($articles as $article)
                <div class="border border-gray-300 rounded-lg p-4 bg-white shadow-md mt-3">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $article->content }}</p>
                    <p class="text-gray-500 text-sm">Publié par: {{ $article->user->prenom }} {{ $article->user->nom }}</p>
                    
                    <div class="text-end">
                        <form action="{{ route('articles.like', $article->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-500 hover:underline font-medium">
                                @if ($article->likedBy()->where('user_id', Auth::id())->exists())
                                <i class="fas fa-heart mr-2"></i>
                                @else
                                <i class="fa-regular fa-heart mr-2"></i>
                                @endif
                            </button>
                        </form>
                    </div>

                    <!-- Section des commentaires -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-800">Commentaires</h3>
                        
                        <!-- Liste des commentaires -->
                        @if ($article->comments->isNotEmpty())
                            <ul class="mt-2 space-y-2">
                                @foreach ($article->comments as $comment)
                                    <li class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                                        <p class="text-gray-600">{{ $comment->content }}</p>
                                        <p class="text-sm text-gray-500">
                                            Posté par {{ $comment->user->prenom ?? 'Utilisateur anonyme' }} 
                                            le {{ $comment->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 mt-2">Pas encore de commentaires.</p>
                        @endif

                        <!-- Formulaire d'ajout de commentaire -->
                        @if (auth()->check())
                            <form action="{{ route('comment', $article->id) }}" method="POST" class="mt-4">
                                @csrf
                                <textarea 
                                    name="content" 
                                    rows="3" 
                                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Ajouter un commentaire..."
                                    required></textarea>
                                <button 
                                    type="submit" 
                                    class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">
                                    Publier
                                </button>
                            </form>
                        @else
                            <p class="text-gray-500 mt-4">
                                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Connectez-vous</a> pour ajouter un commentaire.
                            </p>
                        @endif
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
                <p class="text-gray-600 text-lg mb-4">pas d'article.</p>
            @endif
        </div>
    @endif
</div>
@endsection
