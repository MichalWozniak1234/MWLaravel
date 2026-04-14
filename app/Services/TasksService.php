<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TasksService
{
    public function getAll(): Collection
    {
        return Task::with('internalEvent')->orderBy('Deadline')->get();
    }

    public function getById(int $id): Task
    {
        return Task::with('internalEvent')->findOrFail($id);
    }

    public function create(Request $request): Task
    {
        $validated = $this->validateTask($request);

        $task = new Task();
        $this->fillTask($task, $validated);
        $task->save();

        return $task;
    }

    public function update(Request $request, int $id): Task
    {
        $validated = $this->validateTask($request);

        $task = Task::findOrFail($id);
        $this->fillTask($task, $validated);
        $task->save();

        return $task;
    }

    public function delete(int $id): void
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }

    private function validateTask(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:64',
            'description' => 'required|string',
            'startDateTime' => 'required|date',
            'deadline' => 'required|date|after_or_equal:startDateTime',
            'internalEventId' => 'required|exists:InternalEvents,Id',
            'notes' => 'nullable|string',
            'isDone' => 'nullable|boolean',
            'isActive' => 'nullable|boolean',
        ]);
    }

    private function fillTask(Task $task, array $validated): void
    {
        $task->Title = $validated['title'];
        $task->Description = $validated['description'];
        $task->StartDateTime = $validated['startDateTime'];
        $task->Deadline = $validated['deadline'];
        $task->InternalEventId = (int) $validated['internalEventId'];
        $task->Notes = $validated['notes'] ?? null;
        $task->IsDone = (bool) ($validated['isDone'] ?? false);
        $task->IsActive = (bool) ($validated['isActive'] ?? false);
    }
}
