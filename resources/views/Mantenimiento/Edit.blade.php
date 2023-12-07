@extends('layouts.layout')


@section('title', 'Equipos')
@section('textoencabezado')

<h1 style="text-align:center">EQUIPOS DE CÓMPUTO</h1>

@endsection
@section('contenido')
<center>
    <form action="{{url('/Mantenimiento/'.$equipos2edit->id)}}" class="col-4 p-3 card tex-center"   method="post" enctype="multipart/form-data">
        <h1 class="tex-center alert alert-secondary">Modificar Equipo</h1>
        @csrf
        {{method_field('PATCH')}}
        @if (count($errors)>0)

                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    </div>
                    @endif
        <div>
            <label for="NumeroInventario" class="form-label">Numero de inventario</label>
            <input id="NumeroInventario" name="NumeroInventario" value="{{$equipos2edit->NumeroInventario}}" type="tex" class="form-control" tabindex="1">
        </div>
        <div>
            <label for="Marca" class="form-label">Marca</label>
            <input id="Marca" name="Marca" type="tex"  value="{{$equipos2edit->Marca}}" class="form-control" tabindex="2">
        </div>
        <div>
            <label for="Modelo" class="form-label">Modelo</label>
            <input id="Modelo" name="Modelo" type="tex" value="{{$equipos2edit->Modelo}}" class="form-control" tabindex="2">
        </div>

            <div>
                <label for="NumSerie" class="form-label">Num. Serie</label>
                <input id="NumSerie" name="NumSerie" type="tex" value="{{$equipos2edit->NumSerie}}"" class="form-control" tabindex="2">
            </div>
            <div class="form-group">
                <label for="Caracteristicas">Caractersiticas</label>
                <input class="form-control" name="Caracteristicas" value="{{$equipos2edit->Caracteristicas}}" id="Caracteristicas" rows="3"></<input class="form-control" type="text" name="">
            </div>

            <div class="form-group">
                <label for="Problema">Descrpción del problema</label>
                <input class="form-control" name="Problema"  value="{{$equipos2edit->Problema}}" id="Problema" rows="3"></input>
            </div>
            <div class="form-group">
                <label for="Diagnostico">Diagnostico</label>
                <input class="form-control" name="Diagnostico" value="{{$equipos2edit->Diagnostico}}" id="Diagnostico" rows="3"></input>
            </div>
            <div>
                <label for="Ubicacion" class="form-label">Ubicación</label>
                <input id="Ubicacion" name="Ubicacion" type="tex" value="{{$equipos2edit->Ubicacion}}" class="form-control" tabindex="3">
            </div>
            <br>
            <div class="form-group">
                <label for="Foto"></label>
                <img class="img-thumbnail img-fluid" src="{{asset('Storage').'/'.$equipos2edit->Foto}}"  width="130px" height="130px">
                <br>
                <br>
                <input type="file" class="form-control" value="{{$equipos2edit->Foto}}" name="Foto" id="Foto" placeholder="imagen">
              </div>
            <br>
            <div class="botones">
                <a href="{{ route('mantenimiento') }}" class="btn btn-secondary" tabindex="6">Regresar</a>

                <button type="submit" class="btn btn-primary" tabindex="7">Guardar Equipo</button>
            </div>

    </form>
 </center>
@endsection
