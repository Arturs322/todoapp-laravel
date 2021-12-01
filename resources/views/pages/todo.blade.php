<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }} To-Do list
        </h2>
        <h4>You have {{ $tasks->total() }} {{ Str::plural('task', $tasks->count())}} in list </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($tasks as $task)
                        <div class="mb-4">
                            <div>
                                <form method="post" action="{{ route('tasks.complete', $task) }}">
                                    @csrf
                                    <input type="checkbox" name="toggleComplete" id="checkbox"
                                           onclick="return confirm('Complete this task?')"
                                           onchange="this.form.submit()" @if($task->completed_at) checked @endif>
                                    @if($task->completed_at) <s> @endif
                                        <strong class="text-xl">{{ $task->title }}</strong>
                                        @if($task->completed_at) </s> @endif
                                </form>
                            </div>
                            <div>
                                @if($task->completed_at) <s> @endif
                                    <small>{{ $task->content }}</small>
                                    @if($task->completed_at) </s> @endif
                            </div>
                            <span class="text-gray-500 text-sm">
                                @if(!$task->completed_at)Created at: {{ $task->created_at }}
                                @else Completed at: {{$task->completed_at}}
                                @endif
                            </span>
                            <div class="text-sm text-blue-700">
                                <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                    @csrf
                                    @method('DELETE')
                                    @if(!$task->completed_at)
                                        <a href="{{ route('tasks.edit', $task) }}">
                                            Edit</a>
                                    @endif
                                    <button type="submit" class="text-red-700"
                                            onclick="return confirm('Task will be deleted: {{ $task->title }} Proceed?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

