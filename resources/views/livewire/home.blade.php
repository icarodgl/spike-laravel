<div class="flex flex-col" >

    <form method="post" class="flex justify-center w-1/2" wire:submit.prevent='create'>
        @csrf
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label class="text-white" for="title">titulo</label>
                <input type="text" name="title" id="title" wire:model="title">
                @error('title')
                    <span class="text-white">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-white" for="description">Descrição</label>
                <textarea type="text" name="description" id="description" wire:model="description"></textarea>
                @error('description')
                    <span class="text-white">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex flex-col"
            x-data="{ isUploading: false, progress: 0 }"

            x-on:livewire-upload-start="isUploading = true"

            x-on:livewire-upload-finish="isUploading = false"

            x-on:livewire-upload-error="isUploading = false"

            x-on:livewire-upload-progress="progress = $event.detail.progress">
                @if ($image)
                <img class="max-w-xs max-h-xs" src="{{ $image->temporaryUrl() }}">
            @endif
            <div x-show="isUploading">

                <progress max="100" x-bind:value="progress"></progress>

            </div>
                <label class="text-white" for="image">Imagem</label>
                <input type="file" accept="image/*" name="image" id="image" wire:model="image">
                @error('image')
                    <span class="text-white">{{ $message }} </span>
                @enderror
            </div>

            <button type="submit" class="text-white">Criar</button>
        </div>

    </form>
    <ul class="flex w-8/12 flex-col self-center mt-6">
        @foreach ($noticias as $noticia)
            <li class="flex flex-col flex-wrap">
                <div>
                    <h1 class="text-white"> {{ $noticia->title }}</h1>
                </div>
                <div>
                    <h2 class="text-white"> {{ $noticia->description }}</h2>
                </div>
                <div>
                    <picture>
                        <img class="max-w-1.5 max-h-1.5" src="{{$noticia->image}}"  alt="imagem" style="width:auto;">
                    </picture>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="flex justify-center mt-6">
        {{ $noticias->links() }}
    </div>
</div>
