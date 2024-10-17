@props(['links'])

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
                    <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                        style="background-color: {{ $link->channel->color }}">
                        {{ $link->channel->title }}
                    </span>
                @endforeach

            </ul>
            {{$links->links()}}
        </div>
    </div>
</div>