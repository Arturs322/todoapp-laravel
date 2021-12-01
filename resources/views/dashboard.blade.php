<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-3xl mb-4 flex items-center justify-center">
                        <p> You are LOGED IN! </p>
                    </div>
                    <div class="mb-4 flex items-center justify-center">
                        <div style="width:480px">
                            <iframe allow="fullscreen" frameBorder="0" height="270"
                                    src="https://giphy.com/embed/G96zgIcQn1L2xpmdxi/video"
                                    width="480"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
