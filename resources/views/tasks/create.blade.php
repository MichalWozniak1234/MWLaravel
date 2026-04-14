@extends('main')

@section('header')
    <div class="container mb-4">
        <h1 class="mb-1">Create task</h1>
        <p class="text-muted mb-0">Add a new task and connect it with an internal event.</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="/tasks/create">
                    @csrf
                    @include('tasks._form', ['events' => $events])
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Save task</button>
                        <a href="/tasks" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
