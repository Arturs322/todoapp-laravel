<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="py-6 px-8 h-80 bg-white rounded shadow-xl">

                            <form method="post" action="{{ route('tasks.store') }}" name="task_form">
                                @csrf
                                @include('includes._form', ['task' => new \App\Models\Task])
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>


