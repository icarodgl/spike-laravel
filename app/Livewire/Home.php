<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Illuminate\Http\Request;
class Home extends Component
{

    protected $rules = [
        'title'=>'required|min:3|max:255',
        'description'=>'required|min:3|max:255',
        'image'=>'required|min:3|max:255',
    ];

    public function render()
    {

        $noticias = Noticia::get();

        return view('livewire.home', [
            'noticias'=> $noticias
        ]);
    }

    public function create(Request $request){
        $this->validate();

        Noticia::create([
            'title'=>'Titulo',
            'description'=>'descrição',
            'image'=>'imagem',
            'user_id'=>1
        ]);
    }
}
