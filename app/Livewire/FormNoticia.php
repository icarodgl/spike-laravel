<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Url;

class FormNoticia extends Component
{
    use WithFileUploads;
    #[Url(as: 'noticia')]
    public ?string $noticia = null;

    #[Validate('required',message:'Campo obrigatório')]
    #[Validate('min:3',message:'Minimo de 3 caractéres')]
    public $title = '';

    #[Validate('required',message:'Campo obrigatório')]
    #[Validate('min:3',message:'Minimo de 3 caractéres')]
    public $description = '';
    #[Validate('image', message:'Imagem é obrigatório')]
    #[Validate('max:1024', message:'Tamanho máximo excedido (1MB)')]
    public $image = null;
    public function render()
    {

        if($this->noticia && !$this->image){
            $noticia = Noticia::find($this->noticia);
            if($noticia){
                $this->title =  $noticia->title;
                $this->description =  $noticia->description;
                $this->image = $noticia->image;
            }else{
                $this->redirect('/', navigate: true);
            }
        }
        return view('livewire.form-noticia');
    }

    public function create(Request $request)
    {

        if($this->noticia && $noticia = Noticia::find($this->noticia) ){
            if(!is_string($this->image) && $this->image->getMimeType()){
                $disk = Storage::build([
                'driver' => 'local',
                'root' => './',
            ]);
            $imagePath =$disk->put('images', $this->image);
            }else{
                $imagePath = $this->image;
            }

            $noticia->update(
                [
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath
                ]
            );
        }else{
            $this->validate();
            $disk = Storage::build([
                'driver' => 'local',
                'root' => './',
        ]);
         $imagePath =$disk->put('images', $this->image);
            $request->user()->noticias()->create(
            [
                'title' => $this->title,
                'description' => $this->description,
                'image' => $imagePath
            ]
        );
        }
        $this->redirect('/', navigate: true);
    }
}
