<h1>{{ $modo }} Libro</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-group">
<label for="key">Clave:</label>
<input class="form-control" type="text" name="key" value="{{isset($libr->key)?$libr->key:old('key')}}" id="key"><br>
</div>

<div class="form-group">
<label for="image"></label>
@if(isset($libr->image))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$libr->image}}" width="100" alt="">
@endif
<input class="form-control" type="file" name="image" value="{{isset($libr->image)?$libr->image:old('image')}}"  id="image"><br>
</div>

<div class="form-group">
<label for="title">Titulo:</label>
<input class="form-control" type="text" name="title" value="{{isset($libr->title)?$libr->title:old('title')}}" id="title"><br>
</div>

<div class="form-group">
<label for="editorial">Editorial:</label>
<input class="form-control" type="text" name="editorial" value="{{isset($libr->editorial)?$libr->editorial:old('editorial')}}" id="editorial"><br>
</div>

<div class="form-group">
<label for="edition">Edicion:</label>
<input class="form-control" type="text" name="edition" value="{{isset($libr->edition)?$libr->edition:old('edition')}}" id="edition"><br>
</div>

<div class="form-group">
<label for="author">Autor:</label>
<input class="form-control" type="text" name="author" value="{{isset($libr->author)?$libr->author:old('author')}}" id="author"><br>
</div>

<div class="form-group">
    <label for="created_at">Fecha de Creación:</label>
    <input class="form-control" type="date" name="created_at" value="{{ isset($libr->created_at) ? $libr->created_at : old('created_at') }}" id="created_at"><br>
</div>

<div class="form-group">
<label for="updated_at">Fecha de Actualización:</label>
<input class="form-control" type="date" name="updated_at" value="{{isset($libr->updated_at)?$libr->updated_at:old('updated_at')}}" id="updated_at"><br>
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{url('books/')}}">Regresar</a>