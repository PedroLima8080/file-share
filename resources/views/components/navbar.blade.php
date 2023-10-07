<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">FileShare :D</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="flex: 1;">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                @if(Auth::user()['admin'])
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}" aria-current="page" href="{{ route('user.index') }}">Usuários</a>
                    </li>
                @endif
                <li class="nav-item ms-auto">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-4">Sair</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
