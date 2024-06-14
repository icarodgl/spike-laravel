<div class="grid justify-center">
    <form method="post" class="flex justify-center self-center my-3" wire:submit.prevent='create'>
        @csrf
        <div class="flex flex-col">
            <div class="flex flex-col my-3">
                <label class="text-slate-400" for="title">Titulo:</label>
                <x-text-input type="text" name="title" id="title" wire:model="title" />
                @error('title')
                    <span class="text-red-600">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex flex-col my-3">
                <label class="text-slate-400" for="description">Descrição:</label>
                <x-textarea-input rows="10" cols="100" type="text" name="description" id="description"
                    wire:model="description" />
                @error('description')
                    <span class="text-red-600">{{ $message }} </span>
                @enderror
            </div>

            <div class="flex my-3 h-64" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <div class="w-full">
                    <div class="flex flex-col absolute">

                    <div class="overflow-hidden h-8 relative mt-4 mb-4">
                        <button type="button"
                            class="bg-blue hover:bg-blue-light text-white font-bold py-2 px-4 w-full inline-flex items-center">
                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                            </svg>
                            <span class="ml-2">Upload de Imagem</span>
                        </button>
                        <input class="relative bottom-8 z-50 cursor-pointer block w-full opacity-0 pin-r pin-t"
                            type="file" accept="image/*" name="image" id="image" wire:model="image">
                    </div>
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
                    @error('image')
                        <span class="text-red-600">{{ $message }} </span>
                    @enderror
                </div>

                    <div class="w-full flex justify-end mt-4">
                        @if ($noticia)
                            <div class="mr-3">
                                <x-danger-button type="button" wire:click="delete"
                                    wire:confirm="Tem certeza que deseja deletar esta noticia?">Deletar</x-danger-button>
                            </div>
                        @endif
                        <x-primary-button type="submit">Salvar</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
