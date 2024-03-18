<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @include("fragment.subview")
    @include("fragment.subview")
    @include("fragment.subview")


    @if($name !== "Andres Cruz")
        Es True
    @else
        No es True
    @endif
    
    @foreach ($array as $a)
    @include("fragment.subview")
        <div class="box item">
            <p>{{$a}}</p>
        </div>
    @endforeach

    <hr>

    @forelse ($array as $a)
    <div class="box item">
        <p>*{{$a}}</p>
    </div>
    @empty
        No hay Data
    @endforelse

    <h1>{{ $name }}</h1>
    {{ $age }}
    {!! $html !!}

    <!-- Voy a escapar el siguiente html  -->
    {{-- Voy a escapar el siguiente html --}}

</body>
</html>