@extends('main')

@section('header')
    <div class="container mb-4">
        <h1 class="mb-1">Edit task</h1>
        <p class="text-muted mb-0">Task for internal event: {{ $task->internalEvent?->Title }}</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="/tasks/{{ $task->Id }}">
                    @csrf
                    @method('PUT')
                    @include('tasks._form', ['events' => $events, 'task' => $task])
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update task</button>
                        <a href="/tasks/{{ $task->Id }}" class="btn btn-outline-secondary">Back to details</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
