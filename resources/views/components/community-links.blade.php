@props(['links'])
@if ($links->isEmpty())
    <div class="bg-white p-10 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">¡Lo siento!</h1>
        <p class="text-gray-700">Actualmente no hay enlaces disponibles.</p>
    </div>
@else

    <div class="flex-1 mr-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <ul class="list-disc pl-5">
                    @foreach ($links as $link)
                            <li class="mt-3 p-4 border">
                                <form method="POST" action="/votes/{{ $link->id }}">

                                    @csrf

                                    <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 disabled:opacity-50 {{ Auth::check() && Auth::user()->votedFor($link) ?

                        'bg-green-500 hover:bg-green-600 text-white' :

                        'bg-gray-500 hover:bg-gray-600 text-white'

                                                }}" {{ !Auth::user()->isTrusted() ? 'disabled' : '' }}>

                                        {{ $link->users()->count() }}

                                    </button>

                                </form>

                                {{$link->title}}
                                <small class="w-1"> - Contributed by: {{$link->creator->name}}
                                    {{$link->updated_at->diffForHumans()}}</small>
                            </li>
                            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                                style="background-color: {{ $link->channel->color }}">
                                <a href="/dashboard/{{ $link->channel->slug }}">
                                    {{ $link->channel->title }}
                                </a>
                            </span>



                    @endforeach

                </ul>
                {{$links->links()}}
            </div>
        </div>
    </div>

@endif