<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Community Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <div class="flex-1 mr-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <ul class="list-disc pl-5">
                                @foreach ($links as $link)
                                    <li class="mt-3 p-4 border">
                                        {{$link->title}}
                                        <small class="w-1"> - Contributed by: {{$link->creator->name}}
                                            {{$link->updated_at->diffForHumans()}}</small>
                                    </li>
                                @endforeach
                            </ul>
                            {{$links->links()}}
                        </div>
                    </div>
                </div>

                <div class="w-1/4">
                    <x-community-add-link />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>