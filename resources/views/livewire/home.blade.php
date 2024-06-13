<div class="flex flex-col content-center">
    <h1 class="text-center text-slate-300 text-4xl">Notícias</h1>
    <ul class="flex flex-col w-10/12 self-center mt-6">
        @foreach ($noticias as $noticia)
            <li class="flex mb-5 max-h-96">
                <div class="w-96 h-48 flex justify-center">
                    <img class="self-center max-w-36 max-h-36" src="{{ $noticia->image }}" alt="imagem">
                </div>
                <div class="w-svw h-48">
                    <div>
                        <h1 class="text-slate-300 text-center text-xl mb-3"> {{ $noticia->title }}</h1>
                    </div>
                    <div>
                        <span class="text-slate-500 text-justify text-sm">Postado em: {{$noticia->created_at->format("j, n, Y")}}</span>
                        <p class="text-slate-500 text-justify"> {{ $noticia->description }}</p>
                    </div>
                </div>
                @auth
                <div>
                    <a href="{{route('noticias',['noticia' => $noticia->id ])}}" class="self-end text-slate-300 cursor-pointer">Editar</a>
                </div>
                @endauth
            </li>
        @endforeach
    </ul>

    <div class="flex justify-center mt-6">
        {{ $noticias->links() }}
    </div>
</div>
