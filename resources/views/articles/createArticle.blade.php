@extends('base')

@section('title', 'Créer un article')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Créer un article</h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" 
                    placeholder="Entrez le titre de l'article" 
                    required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenu</label>
                <textarea 
                    name="content" 
                    id="content" 
                    class="w-full border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" 
                    placeholder="Écrivez le contenu de l'article" 
                    rows="6" 
                    required></textarea>
            </div>
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Créer
                </button>
            </div>
        </form>
    </div>
@endsection
