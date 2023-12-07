@extends('layouts.layout')


@section('title', 'Mantenimiento')
@section('textoencabezado')

<h1 style="text-align:center">MANTENIMIENTO</h1>

@endsection
@section('contenido')
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Mante">
    Nuevo Equipo
  </button>
  <a type="button"  class="btn btn-secondary" href="{{ route('equiposPDF.pdf') }}">Imprimir</a>

    <center>
    <hr>
    @if (session('sucess'))
    <h6 class=" alert alert-success">{{ session('sucess')}}</h6>
    @endif
    @if (session('error'))
        <h6 class="alert alert-danger">>{{ session('error') }}</h6>
    @endif
   </center>
  <hr>
<div>
    <table id="Equipos12" class="table table-striped table-bordered mt-12 " style="width:100%">

        <thead class="bg-ptimary text-black">
            <th scope="col">#</th>
            <th scope="col">Numero de inventrio</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Nu. Serie</th>
            <th scope="col">Caracteristicas del equipo</th>
            <th scope="col">Descrip. del problema</th>
            <th scope="col">Diagnostico</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Foto</th>
            <th scope="col">ACCIONES</th>
        </thead>

        <tbody>
            @foreach ($Mantenimiento as $equipos )


            <tr>
                <td>{{$equipos->id}}</td>
                <td>{{$equipos->NumeroInventario}}</td>
                <td>{{$equipos->Marca}}</td>
                <td>{{$equipos->Modelo}}</td>
                <td>{{$equipos->NumSerie}}</td>
                <td>{{$equipos->Caracteristicas}}</td>
                <td>{{$equipos->Problema}}</td>
                <td>{{$equipos->Diagnostico}}</td>
                <td>{{$equipos->Ubicacion}}</td>
                <td><img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$equipos->Foto}}" alt="" width="90px" height="80px"></td>
                <td>
                    <form class="d-inline">
                        <a href="{{ url('/Mantenimiento/' . $equipos->id . '/edit') }}" type="button"
                            class="btn btn-secondary d-inline">
                            Modificar
                        </a>
                    </form>

                    <form action="{{ url('/Mantenimiento/' . $equipos->id) }}" class="d-inline" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-sm" type="submit"
                            onclick="return confirm('¿Estas Seguto de eliminarlo?')">Eliminar</button>
                    </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $Mantenimiento->links() !!}
    </div>
</div>
@include('Mantenimiento.Create')


<script>

    $(document).ready(function () {
            var table = $('#Equipos12').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                    extend: 'pdfHtml5',
                    text: '<i class="fa-solid fa-file-pdf"></i> Guardar PDF',
                    title: 'Lista de equipos en mantenimiento',
                    exportOptions: {
                        modifier: {
                            page: 'current',
                        },
                        columns: [1, 2, 3, 4, 5, 6,7,8]
                    }
                }
                ]
            });
        });
        </script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"/>
    <!-- JS necesario para la tabla -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <!-- Creador de PDF y tipo de letra necesario via stream -->
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/vfs_fonts.min.js"></script>
    <script type="application/octet-stream" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/fonts/Roboto/Roboto-Regular.ttf"> </script>
    <script type="application/octet-stream" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/fonts/Roboto/Roboto-MediumItalic.ttf"> </script>
    <script type="application/octet-stream" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/fonts/Roboto/Roboto-Medium.ttf"> </script>
    <script type="application/octet-stream" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.8/fonts/Roboto/Roboto-Italic.ttf"> </script>


@endsection




