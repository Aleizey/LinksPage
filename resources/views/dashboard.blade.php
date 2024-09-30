<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Community Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    @foreach ($links as $link)
                        <li>{{$link->title}}</li>
                    @endforeach
                    {{$links->links()}}

                    <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>