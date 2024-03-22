@extends('dashboard.layout')

@section('content')
<h1>Actualizar category: {{$category->title}}</h1>

@include('dashboard\post.fragment._errors-form')

<form action="{{ route('category.update', $category->id) }}" method="post">

    @method("PATCH")
    @include('dashboard\post.category._form')


</form>

@endsection