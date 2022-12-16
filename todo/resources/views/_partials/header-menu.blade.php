<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/"
                    class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="/" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Liste des tâches
                        </a>
                    </li>
                    </li>
                    <li>
                        <a href="{{ route('todo-form') }}" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Ajouter une tâche
                        </a>
                    </li>
                    @if (!empty($todos))
                        <li>
                            <form method="POST" action="{{ route('todo-delete-all') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Tout supprimer</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
