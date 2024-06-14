<div class="grid justify-center">
    @if ($noticia)
    <div class="w-2/3 flex justify-end mt-4">
        <button wire:click="delete" wire:confirm="Tem certeza que deseja deletar esta noticia?"class="text-white border rounded w-14 bg-red-400">Deletar</button>
    </div>
    @endif
    <form method="post" class="flex justify-center self-center w-2/3" wire:submit.prevent='create'>
        @csrf
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label class="text-slate-400" for="title">Titulo:</label>
                <input type="text" name="title" id="title" wire:model="title">
                @error('title')
                    <span class="text-red-600">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-slate-400" for="description">Descrição:</label>
                <textarea type="text" name="description" id="description" wire:model="description"></textarea>
                @error('description')
                    <span class="text-red-600">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex h-52" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                @if ($image)
                    @if (!is_string($image))
                        <img class="w-48 h-48 m-3" src="{{ $image->temporaryUrl() }}">
                    @else
                        <img class="w-48 h-48 m-3" src="{{ URL::asset($image) }}">
                    @endif
                @endif
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                <div>
                    <label class="text-slate-400" for="image">Upload de Imagem:</label>
                    <input class="text-slate-400"  type="file" accept="image/*" name="image" id="image" wire:model="image">
                </div>

                @error('image')
                    <span class="text-red-600">{{ $message }} </span>
                @enderror
            </div>
            <div class="w-full flex justify-end mt-4">
            <button type="submit" class="text-white border rounded w-14 bg-slate-500">Salvar</button>
            </div>
        </div>
    </form>
</div>
