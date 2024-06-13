<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Livewire\WithPagination;



class Home extends Component
{
    use WithPagination;
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

}
