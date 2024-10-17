<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Community Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <x-community-links :links="$links" />

                <div class="w-1/4">
                    <x-community-add-link :channels="$channels"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>