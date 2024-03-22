@csrf

<label for="">Titulo</label>
<input class="form-control" type="text" name="title" value="{{$category->title}}">

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" value="{{$category->slug}}">

<button class="btn btn-success mt-3" type="submit">Enviar</button>