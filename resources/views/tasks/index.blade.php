@extends('main')

@section('header')
    <div class="container mb-4">
        <div class="row align-items-center g-3">
            <div class="col-md-8">
                <h1 class="mb-1">Tasks</h1>
                <p class="text-muted mb-0">All tasks with their related internal event.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="/tasks/create" class="btn btn-primary">Create task</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row g-4">
            @forelse($tasks as $task)
                <div class="col-lg-6">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h2 class="h4 mb-1">{{ $task->Title }}</h2>
                                    <p class="text-muted mb-0">Internal event: {{ $task->internalEvent?->Title }}</p>
                                </div>
                                <span class="badge {{ $task->IsDone ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ $task->IsDone ? 'Done' : 'In progress' }}
                                </span>
                            </div>
                            <p>{{ $task->Description }}</p>
                            <div class="small text-muted">
                                <div>Start: {{ $task->StartDateTime->format('Y-m-d H:i') }}</div>
                                <div>Deadline: {{ $task->Deadline->format('Y-m-d H:i') }}</div>
                                <div>Status: {{ $task->IsActive ? 'Active' : 'Inactive' }}</div>
                            </div>
                        </div>
                        <div class="card-footer bg-white d-flex gap-2 flex-wrap">
                            <a href="/tasks/{{ $task->Id }}" class="btn btn-outline-secondary">Details</a>
                            <a href="/tasks/{{ $task->Id }}/edit" class="btn btn-outline-primary">Edit</a>
                            <form method="POST" action="/tasks/{{ $task->Id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info mb-0">No tasks found. Create the first one.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
