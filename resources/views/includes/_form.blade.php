<div class="mb-4">
    <a href="{{ route('tasks.index') }}"
       class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600"><- Back to
        List</a>
    <div class="mb-6">
        <label for="title" class="block text-gray-800 font-bold">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? '' }}"
               class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"/>
    </div>

    <div>
        <label for="content" class="block text-gray-800 font-bold">Content:</label>
        <textarea name="content" id="content"
                  class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600">{{ $task->content ?? ''}}</textarea>
    </div>
        <button
            class="cursor-pointer py-2 px-4 block mt-2 bg-indigo-500 text-white font-bold text-center rounded">
            Save
        </button>
</div>

