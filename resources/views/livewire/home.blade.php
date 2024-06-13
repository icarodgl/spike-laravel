<div >

    <form method="post" wire:submit.prevent='create'>

        <input type="text" name="title" id="title">
        <input type="text" name="description" id="description">
        <input type="text" name="image" id="image">

        <button type="submit" class="text-white">Criar</button>
    </form>
    <ul>
@foreach ($noticias as $noticia)
        <li>
          <div><h1 class="text-white"> {{$noticia->title}}</h1></div>
          <div><h2 class="text-white"> {{$noticia->description}}</h2></div>
          <div><h3 class="text-white"> {{$noticia->content}}</h3></div>
        </li>
@endforeach
</ul>
</div>
