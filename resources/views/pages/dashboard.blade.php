@extends('base')
@section('title', 'login')

@section('content')
<x-navbar/>
<main>
    <div class="min-h-screen sm:w-flex-col flex items-center justify-center">
        <div class="flex sm:w-flex-col gap-3">
            <div class="w-1/2 w-[200px] h-[150px] hover:bg-gray-800 hover:text-white sm:w-full border border-gray-800 text-center flex items-center justify-center">
                <a href="{{route('articles.create')}}" class="flex items-center gap-2">
                    <i class="fas fa-plus-circle text-gray-500"></i>
                    Créer un article
                </a>
            </div>
            <div class="w-1/2 w-[200px] h-[150px] hover:bg-gray-800 hover:text-white sm:w-full border border-gray-800 text-center flex items-center justify-center">
                <a href="{{route('articles.list')}}" class="flex items-center gap-2">
                    <i class="fas fa-eye text-gray-500"></i>
                    Voir mes articles
                </a>
            </div>
        </div>
    </div>  
</main>
@endsection
