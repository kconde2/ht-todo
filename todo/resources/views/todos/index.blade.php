@extends('layouts.main')
@section('content')
    <section style="width: 36rem;">
        @include('_partials.flash-message')

        <div class="list-group">
            @forelse ($todos as $todo)
                <label class="list-group-item d-flex gap-3 {{ $todo->checked ? 'text-decoration-line-through' : '' }}">
                    <div class="todo-content">
                        <span class="pt-1 form-checked-content">
                            <strong>{{ $todo->text }}</strong>
                            <small class="d-block text-muted">
                                {{ $todo->getFormattedUpdatedAt() }}
                            </small>
                        </span>
                    </div>
                    <div class="todo-buttons ms-auto d-flex">
                        <form method="POST" action="{{ route('todo-toggle', ['id' => $todo->id]) }}">
                            @csrf
                            @method('PUT')
                            @if ($todo->checked)
                                <button type="submit" class="btn btn-warning ms-2">Décocher</button>
                            @else
                                <button type="submit" class="btn btn-primary ms-2">Cocher</button>
                            @endif
                        </form>

                        <div class="d-flex">
                            <form>
                                <a type="button" href="{{ route('todo-form', ['id' => $todo->id]) }}"
                                    class="btn btn-secondary ms-2">Modifier</a>
                            </form>
                            <form method="POST" action="{{ route('todo-delete', ['id' => $todo->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </label>
            @empty
                <div class="alert alert-info" role="alert">
                    Aucun tâche n'est présente.
                </div>
            @endforelse
        </div>

    </section>
@endsection
