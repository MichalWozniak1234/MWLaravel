<?php

namespace App\Http\Controllers;

use App\Services\InternalEventsService;
use App\Services\TasksService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasksController extends Controller
{
    public function index(): View
    {
        $tasksService = new TasksService();

        return view('tasks.index', [
            'tasks' => $tasksService->getAll(),
        ]);
    }

    public function create(): View
    {
        $eventsService = new InternalEventsService();

        return view('tasks.create', [
            'events' => $eventsService->getNewestEvents(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $tasksService = new TasksService();
        $tasksService->create($request);

        return redirect('/tasks')->with('status', 'Task created successfully.');
    }

    public function show(int $id): View
    {
        $tasksService = new TasksService();

        return view('tasks.show', [
            'task' => $tasksService->getById($id),
        ]);
    }

    public function edit(int $id): View
    {
        $tasksService = new TasksService();
        $eventsService = new InternalEventsService();

        return view('tasks.edit', [
            'task' => $tasksService->getById($id),
            'events' => $eventsService->getNewestEvents(),
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $tasksService = new TasksService();
        $tasksService->update($request, $id);

        return redirect('/tasks')->with('status', 'Task updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $tasksService = new TasksService();
        $tasksService->delete($id);

        return redirect('/tasks')->with('status', 'Task deleted successfully.');
    }
}
