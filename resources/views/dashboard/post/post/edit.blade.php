@extends('dashboard\post.layout')

@section('content')
<h1>Actualizar Post: {{$post->title}}</h1>

@include('dashboard\post.fragment._errors-form')

<form action="{{ route('post.update', $post->id) }}" method="post">

    @method("PATCH")
    @include('dashboard\post.post._form')


</form>

@endsection