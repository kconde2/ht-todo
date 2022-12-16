@php
    $isEdit = !empty($todo);
@endphp

@extends('layouts.main')
@section('content')
    <form method="POST" action="{{ $isEdit ? route('todo-edit', ['id' => $todo->id]) : route('todo-add') }}"
        class="pt-5 mb-5 w-50">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="input-task-name" class="form-label">Nom de la tâche</label>
            <input type="text" class="form-control" id="input-task-name" name="task" aria-describedby="taskHelp"
                value="{{ $isEdit ? $todo->text : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Modifier' : 'Ajouter' }}</button>
    </form>
@endsection
