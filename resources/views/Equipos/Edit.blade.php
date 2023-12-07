@extends('layouts.layout')


@section('title', 'Equipos')
@section('textoencabezado')

<h1 style="text-align:center">EQUIPOS DE CÓMPUTO</h1>

@endsection
@section('contenido')
<center>


                <form action="{{url('/equipos/'.$equipoedit->id)}}" class="col-4 p-3 card tex-center"   method="post" enctype="multipart/form-data" >
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

                    <div class="form-group">
                        <label for="Numero_de_inventario" class="form-label">Numero de inventario</label>
                        <input id="Numero_de_inventario"   name="Numero_de_inventario" value="{{$equipoedit->Numero_de_inventario}}" type="tex" class="form-control" tabindex="1">
                    </div>
                    <div>
                        <label for="Marca" class="form-label">Marca</label>
                        <input id="Marca" name="Marca" type="tex" value="{{$equipoedit->Marca}}" class="form-control" tabindex="2">
                    </div>
                    <div>
                        <label for="Modelo" class="form-label">Modelo</label>
                        <input id="Modelo" name="Modelo" type="tex" value="{{$equipoedit->Modelo}}" class="form-control" tabindex="2">
                    </div>

                        <div>
                            <label for="Num_serie" class="form-label">Num. Serie</label>
                            <input id="Num_serie" name="Num_serie" type="tex" value="{{$equipoedit->Num_serie}}" class="form-control" tabindex="2">
                        </div>
                        <div class="form-group">
                            <label for="Caracteristicas">Carfactersiticas</label>
                            <input class="form-control" name="Caracteristicas" value="{{$equipoedit->Caracteristicas}}" id="descripcion" rows="3"></input>
                        </div>
                        <div>
                            <label class="form-label">Ubicación en sala</label>
                            <input id="Ubicacion" name="Ubicacion" value="{{$equipoedit->Ubicacion}}" class="form-control" tabindex="3">

                        </input>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="Foto"></label>
                            <img class="img-thumbnail img-fluid" src="{{asset('Storage').'/'.$equipoedit->foto}}"  width="130px" height="130px">
                            <br>
                            <br>
                              <input type="file" class="form-control" value="{{$equipoedit->foto}}" name="foto" id="foto" placeholder="imagen">
                          </div>
                        <br>

                        <div class="botones">
                            <a href="{{ route('equipos') }}" class="btn btn-secondary" tabindex="6">Regresar</a>
                            <button type="submit" class="btn btn-warning" tabindex="7">Modificar</button>
                        </div>

                </form>
 </center>
@endsection
