<div class="md:col-span-1 ms-4 bg-white p-6 rounded-lg shadow-md border border-gray-600 self-start">
    <h3 class="text-xl font-semibold mb-4 text-black">Contribute a link</h3>
    <form method="POST" action="/dashboard">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-black font-medium">Title:</label>
            <input type="text" value="{{ old('title') }}" id="title" name="title"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the title of your article?">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="link" class="block text-black font-medium">Link:</label>
            <input type="text" value="{{ old('link') }}" id="link" name="link"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="What is the URL?">
            @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="Channel" class="block text-white font-medium">Channel:</label>
            <select
                class="@error('channel_id') is-invalid @enderror mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                name="channel_id">
                <option selected disabled>Pick a Channel...</option>
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                        {{ $channel->title }}
                    </option>
                @endforeach
            </select>
            @error('channel_id')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="pt-3">
            <button type="submit"
                class="bg-dark border text-black px-4 py-2 rounded-md hover:bg-blue-600">Contribute!</button>
        </div>
    </form>
</div>

{{--
1 - ¿Qué hace la directiva @csrf?

La directiva @csrf en Laravel se utiliza para generar un token CSRF, que ayuda a proteger las aplicaciones web de
ataques.

2 - ¿Qué método se llamará en el controlador CommunityController al enviar el formulario?

Al enviar el formulario en Laravel, se invocará un método específico en el controlador correspondiente, en este caso, el
CommunityController.

3 - Intenta enviar un enlace. ¿Qué ocurrse y cómo puedes resolver el problema?

ocurre que la pagina web no soporta el método post solo el get como se puede ver en el web.php. Para solucionarlo
tenemos que irnos a la web.php y hacer otro route pero con post para el dashboard
--}}