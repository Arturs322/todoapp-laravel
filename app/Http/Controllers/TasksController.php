<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->orderBy('completed_at', 'DESC')
            ->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }
    public function deletedTasks(Request $request)
    {
        $tasks = Task::all();
        if($request->has('deletedTasks'))
        {
            $tasks =Task::onlyTrashed()->get();
        }

        return view('deletedTasks', compact('tasks'), ['tasks' => $tasks]);

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function form()
    {
        return view('tasks.form');
    }

    public function storeRequest(Request $request)
    {
        $task = (new Task([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category_id'),
        ]));
        $task->user()->associate(auth()->user());
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function editTask(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }


    public function updateTask(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category_id'),

        ]);

        return redirect()->route('tasks.edit', $task);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function completed(Task $task): RedirectResponse
    {
        $task->toggleComplete();
        $task->save();
        $task->update([
            'completed_at' => now()
        ]);


        return redirect()->back();
    }

    public function unComplete(Task $task): RedirectResponse
    {

        $task->update([
            'completed_at' => null
        ]);

        return redirect()->back();
    }


    public function delete(Task $task)
    {
        $task->forceDelete();
        return redirect()->route('tasks.index');
    }
}
