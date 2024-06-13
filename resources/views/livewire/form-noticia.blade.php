<div class="flex flex-col">
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

            <div class="flex flex-col" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                @if ($image)
                    @if(!is_string($image) )
                        <img class="max-w-80 max-h-80 obj" src="{{ $image->temporaryUrl()}}">
                    @else
                        <img class="max-w-80 max-h-80 url" src="{{URL::asset($image)}}">
                    @endif
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
</div>
