<nav class="bg-gray-800 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo et liens principaux -->
            <div class="flex items-center">
                <!-- Nom du site ou logo -->
                <a href="/" class="flex-shrink-0 text-xl font-bold">
                    MonSite
                </a>
                
                <!-- Liens de navigation (affichés en grand écran) -->
            </div>
  
            <!-- Section utilisateur -->
            <div class="flex items-center gap-3">
                <!-- Vérification de la connexion -->
                @if (Auth::check())
                <div class="sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{route('articles.all')}}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Articles
                    </a>
                    <a href="{{route('articles.list')}}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Mes Articles
                    </a>
                </div>
                    @include('components.dropdown')
                @else
                    <!-- Liens pour les visiteurs non connectés -->
                    <a href="{{ route('app_login_form') }}" 
                       class="border border-gray-300 hover:bg-gray-300 hover:text-black text-gray-300 px-3 py-2 rounded-md text-sm font-medium">
                        Connexion
                    </a>
                    <a href="{{ route('app_register_form') }}" 
                       class="border border-gray-300 hover:bg-gray-300 hover:text-black text-gray-300 px-3 py-2 rounded-md text-sm font-medium">
                        Inscription
                    </a>
                @endif
            </div>
        </div>
    </div>
  </nav>
  