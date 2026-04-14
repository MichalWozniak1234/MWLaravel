@php
    $task = $task ?? null;
@endphp

<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input
            name="title"
            class="form-control"
            maxlength="64"
            value="{{ old('title', $task?->Title) }}"
            required
        >
    </div>
    <div class="col-md-4">
        <label class="form-label">Internal event</label>
        <select name="internalEventId" class="form-select" required>
            <option value="">Choose internal event</option>
            @foreach($events as $event)
                <option
                    value="{{ $event->Id }}"
                    @selected((string) old('internalEventId', $task?->InternalEventId) === (string) $event->Id)
                >
                    {{ $event->Title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Start date and time</label>
        <input
            name="startDateTime"
            class="form-control"
            type="datetime-local"
            value="{{ old('startDateTime', optional($task?->StartDateTime)->format('Y-m-d\\TH:i')) }}"
            required
        >
    </div>
    <div class="col-md-6">
        <label class="form-label">Deadline</label>
        <input
            name="deadline"
            class="form-control"
            type="datetime-local"
            value="{{ old('deadline', optional($task?->Deadline)->format('Y-m-d\\TH:i')) }}"
            required
        >
    </div>
    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="5" required>{{ old('description', $task?->Description) }}</textarea>
    </div>
    <div class="col-12">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="4">{{ old('notes', $task?->Notes) }}</textarea>
    </div>
    <div class="col-md-6">
        <input type="hidden" name="isDone" value="0">
        <div class="form-check form-switch">
            <input
                name="isDone"
                class="form-check-input"
                type="checkbox"
                value="1"
                @checked((bool) old('isDone', $task?->IsDone))
            >
            <label class="form-check-label">Task finished</label>
        </div>
    </div>
    <div class="col-md-6">
        <input type="hidden" name="isActive" value="0">
        <div class="form-check form-switch">
            <input
                name="isActive"
                class="form-check-input"
                type="checkbox"
                value="1"
                @checked((bool) old('isActive', $task ? $task->IsActive : true))
            >
            <label class="form-check-label">Task active</label>
        </div>
    </div>
</div>
