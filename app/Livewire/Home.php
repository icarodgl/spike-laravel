<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;


    public $search = '';

    public function render()
    {

        $noticias = Noticia::where('title', 'LIKE', "%$this->search%")->latest()->paginate(6);

        foreach ($noticias as $noticia) {
            $noticia->image =asset($noticia->image);
        }
        return view('livewire.home', [
            'noticias' => $noticias,
        ]);
    }

    public function searchNoticia(){
        $this->render();
    }

}
