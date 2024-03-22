@extends('dashboard.layout')

@section('content')
<h1>Crear category</h1>

@include('dashboard\post.fragment._errors-form')

<form action="{{ route('category.store') }}" method="post">
    @include('dashboard\post.category._form')
</form>

@endsection
