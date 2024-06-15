# Projeto para aprender Laravel, Livewire e Tailwind.
Este projeto tem o intuito de aprende as tecnologias do laravel 11 junto com o Livewire e Tailwindcss.

## Rodando o projeto Localmente
Rode os comandos a seguir para instalar o JS:
- `npm i`
- `npm run build` (para preparar os arquivos estáticos)
- `npm run dev` (se for modificar o CSS em tempo real)

Use o seguinte comando para montar as imagens docker:
- `docker-compose up -d`
(Lembre-se de criar a .env usando a .env.example)

Use o seguinte comando para acoplar o terminal ao docker e a seguir instalar dependencias e executar as migrations:
- `docker-compose exec app bash`
    - `composer install`
    - `php artisian migration`


## Referencias:

- https://bootcamp.laravel.com/livewire/installation (Criar projeto Laravel)
- https://github.com/especializati/setup-docker-laravel (Docker pronto)
- [Curso Laravel](https://www.youtube.com/watch?v=NEjmtZq1jpQ&list=PLVSNL1PHDWvThyUgAgJoulpg5kB7GpYqS&index=6)
- [Curso Livewire](https://www.youtube.com/watch?v=UPcK2akEWQs&list=PLVSNL1PHDWvTH6zKPGTfxEdpv1sN0VbeV&index=2)
