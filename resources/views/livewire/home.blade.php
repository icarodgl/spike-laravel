<div class="flex flex-col content-center">
    <h1 class="text-center text-slate-300 text-4xl my-3">Notícias</h1>
    <div class="w-4/12 self-end flex content-center">
        <div class="w-6 text-slate-400 flex content-center mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor" className="size-6">
                <path strokeLinecap="round" strokeLinejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>
        <x-text-input placeholder="Buscar noticias" type="text" name="search" id="search" wire:model='search'
            wire:keydown.enter="searchNoticia" />
    </div>
    <ul class="flex flex-col w-10/12 self-center mt-6">
        @foreach ($noticias as $noticia)
            <li class="flex flex-col mb-5 h-full bg-slate-950 rounded-md shadow-md">
                @auth
                <div class="relative h-0">
                    <div class="my-2 flex justify-end pr-3 w-full">
                        <x-primary-button type="button" href="{{ route('editar noticias', $noticia->id) }}"
                            class="text-slate-300 cursor-pointer" wire:navigate>Editar</x-primary-button>
                    </div>
                </div>
                @endauth
                <div class="my-2 flex self-center justify-center w-full">
                    <h1 class="text-slate-300 text-center text-xl mb-3"> {{ $noticia->title }}</h1>
                </div>
                <div class="flex">
                    <div class="w-96 h-48 flex justify-center">
                        <img class="self-center max-w-36 max-h-36" src="{{ $noticia->image }}" alt="imagem">
                    </div>
                    <div class="w-svw h-48">
                        <div>
                            <span class="text-slate-500 text-justify text-sm">Postado em:
                                {{ $noticia->created_at->format('j, n, Y') }}</span>
                            <p class="text-slate-500 text-justify overflow-y-auto h-28"> {{ $noticia->description }}</p>
                        </div>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>

    <div class="flex justify-center mt-6">
        {{ $noticias->links() }}
    </div>
</div>
