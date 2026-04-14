@extends('main')

@section('header')
    <div class="container mb-4">
        <h1 class="mb-1">{{ $task->Title }}</h1>
        <p class="text-muted mb-0">Connected internal event: {{ $task->internalEvent?->Title }}</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h2 class="h5">Task data</h2>
                        <p class="mb-2"><strong>Internal event:</strong> {{ $task->internalEvent?->Title }}</p>
                        <p class="mb-2"><strong>Start:</strong> {{ $task->StartDateTime->format('Y-m-d H:i') }}</p>
                        <p class="mb-2"><strong>Deadline:</strong> {{ $task->Deadline->format('Y-m-d H:i') }}</p>
                        <p class="mb-2"><strong>Done:</strong> {{ $task->IsDone ? 'Yes' : 'No' }}</p>
                        <p class="mb-0"><strong>Active:</strong> {{ $task->IsActive ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="h5">Description</h2>
                        <p>{{ $task->Description }}</p>
                        <h2 class="h5 mt-4">Notes</h2>
                        <p class="mb-0">{{ $task->Notes ?: 'No notes added.' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex gap-2 flex-wrap">
                <a href="/tasks" class="btn btn-outline-secondary">Back to list</a>
                <a href="/tasks/{{ $task->Id }}/edit" class="btn btn-primary">Edit</a>
                <form method="POST" action="/tasks/{{ $task->Id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
