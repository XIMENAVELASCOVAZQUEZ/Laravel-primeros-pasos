@csrf

<label for="">Titulo</label>
<input type="text" name="title" value="{{$category->title}}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{$category->slug}}">

<button type="submit">Enviar</button>