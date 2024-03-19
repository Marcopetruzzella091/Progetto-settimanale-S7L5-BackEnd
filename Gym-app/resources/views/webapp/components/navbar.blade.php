<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EpiGym</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/course/create">Nuova Prenotazione</a>
                </li>
            </ul>
            <span class="navbar-text d-flex align-items-center">
            @if(Auth::check())
    
    <p class="m-0"> {{ Auth::user()->name }}</p>
    <form class="m-0" method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="#"  class="btn btn-secondary mx-3" onclick="event.preventDefault(); this.closest('form').submit();">
        Logout
    </a>
</form>
    <a href="/profile" class="btn btn-secondary">Profilo Utente</a>
    
@else
   
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/posts">Home</a>
                </li>
            </ul>
@endif
            </span>
            </div>
        </div>
    </nav>
