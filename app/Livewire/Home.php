<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

use Illuminate\Support\Facades\Storage;


class Home extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:3')]
    public $description = '';
    #[Validate('image|max:1024')]
    public $image = null;


    public function render()
    {

        $noticias = Noticia::paginate(5);

        foreach ($noticias as $noticia) {
            $noticia->image =asset($noticia->image);
        }
        return view('livewire.home', [
            'noticias' => $noticias
        ]);
    }

    public function create(Request $request)
    {
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

        $this->title ='';
        $this->description= '';
        $this->image = null;
    }
}
