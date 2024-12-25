<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{Auth::user()->prenom}}
    {{Auth::user()->nom}} 
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('profile')}}">Mon profile</a></li>
    <li><a class="dropdown-item" href="#">Parametre</a></li>
    <li>
      <form action="{{ route('app_logout') }}" method="POST">
      @csrf
        <button class="w-full px-1 py-1 bg-gray-300 reative bottom-4" type="submit">
          Déconnexion
        </button>
    </form>
    </li>
  </ul>
</div>