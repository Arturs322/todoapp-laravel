<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }} Task Trash
        </h2>
        <h4>You have {{ $tasks->total() }} {{ Str::plural('task', $tasks->count())}} in trash </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($tasks as $task)
                        @if(!$task->deleted_at) No tasks to show @endif
                        <div class="mb-4">
                            <div>
                                <strong class="text-xl text-red-400">{{ $task->title }}</strong>
                            </div>
                            <div>
                                <small>{{ $task->content }}</small>
                                @if($task->completed_at) </s> @endif
                            </div>
                            <span class="text-gray-500 text-sm">
                                Deleted at: {{$task->deleted_at}}
                            </span>
                            <div class="text-sm text-blue-700">
                                @if($task->trashed())
                                    <form method="post" action="{{ route('tasks.restore', $task) }}">
                                        @csrf
                                        <button type="submit"
                                                onclick="return confirm('Restore task?')">
                                            Restore
                                        </button>
                                    </form>
                                    <form method="post" action="{{ route('tasks.delete', $task) }}">
                                        @csrf
                                        <button type="submit" class="text-red-700"
                                                onclick="return confirm('This will delete task forever and ever. Proceed?')">
                                            Delete forever
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

