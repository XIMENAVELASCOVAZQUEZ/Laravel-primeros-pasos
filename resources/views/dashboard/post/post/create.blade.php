@extends('dashboard\post.layout')

@section('content')
<h1>Crear Post</h1>

@include('dashboard\post.fragment._errors-form')

<form action="{{ route('post.store') }}" method="post">
    @include('dashboard\post.post._form')
</form>

@endsection