@extends("main")
@section("content")
<div class="container">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h1 class="h3">Internal events</h1>
                    <p class="text-muted">Browse and add events created during laboratory classes.</p>
                    <a href="/internal-events" class="btn btn-primary">Open internal events</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h1 class="h3">Tasks</h1>
                    <p class="text-muted">Manage task CRUD operations with a foreign key to internal events.</p>
                    <a href="/tasks" class="btn btn-primary">Open tasks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
