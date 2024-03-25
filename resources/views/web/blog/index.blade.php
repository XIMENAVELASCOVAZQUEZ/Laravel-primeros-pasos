@extends('web\blog.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts" >
        <h1>Listado principal de Post</h1>

        @slot('header')
            <h1>Listado principal de Post -- slot con nombre</h1>
        @endslot

        @slot('footer')
            <footer>
                Pie de página
            </footer>
        @endslot

        @slot('extra', 'Extra')

    </x-web.blog.post.index>
@endsection