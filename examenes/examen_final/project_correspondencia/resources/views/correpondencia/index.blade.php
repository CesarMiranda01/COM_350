<!-- incluir el menu -->
@extends('layouts.app')
@section('content')
<div class="container">

<!-- si recibimos un mensaje de un formulario -->
<!-- @if(Session::has('mensaje')) -->
<!-- el mensaje con estilo -->
<div class="alert alert-success alert-dismissible" role="alert">
<!-- vamos mostrar dicho mensaje -->
<!-- {{Session::get('mensaje')}} -->
<!-- el boton para desaparecer el mensaje alert -->
<button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<!-- @endif -->


<a href="{{url('correspondencia/create')}}" class="btn btn-success">Registrar nueva Correspondencia</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>fecha</th>
            <th>remitente</th>
            <th>asunto</th>
            <th>cite</th>
            <th>destinatario_id</th>
            <th>fecha de creacion</th>
            <th>fecha de modificacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($destinatarios as $dest)
        <tr>
            <td>{{$dest->id}}</td>
            <td>{{$dest->fecha}}</td>
            <td>{{$dest->remitente}}</td>
            <td>{{$dest->asunto}}</td>
            <td>{{$dest->cite}}</td>
            <td>{{$dest->destinatario_id}}</td>
            <td>{{$dest->created_at}}</td>
            <td>{{$dest->updated_at}}</td>
            <td>
            Eliminar|Insertar
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
        </tr>
    </tfoot>
</table>
{!! $destinatarios->links() !!}

</div>
@endsection
