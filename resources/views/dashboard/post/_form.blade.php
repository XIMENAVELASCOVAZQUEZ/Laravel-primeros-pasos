@csrf

<label for="">Titulo</label>
<input type="text" class="form-control" name="title" value="{{$post->title}}">

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" value="{{$post->slug}}">

<label for="">Categoria</label>
<select class="form-control" name="category_id">
    <option value=""></option>
    @foreach ($categories as $title => $id)
        <option {{$post->category_id == $id ? 'selected' : ''}} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select class="form-control" name="posted">
    <option {{$post->posted == "not" ? 'selected' : ''}} value="not">No</option>
    <option {{$post->posted == "yes" ? 'selected' : ''}} value="yes">Si</option>
</select>

<label for="">Contenido</label>
<textarea class="form-control" name="content">{{$post->content}}</textarea>

<label for="">Descripción</label>
<textarea class="form-control" name="description">{{$post->description}}</textarea>

@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif

<button type="submit" class="btn btn-success mt-3">Enviar</button>