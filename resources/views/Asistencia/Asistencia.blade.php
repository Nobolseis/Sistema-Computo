@extends('layouts.layout')
@section('title', 'Asistencia')
@section('textoencabezado')

    <h1 style="text-align:center">Asistencia</h1>

@endsection
@section('contenido')

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Asis">
    Nuevo Alumno
  </button>
<hr>
<div class="col-xl-12">
    {{-- <form action="{{route('asistencia.index')}}" method="get">
        <div class="form-row">
            <div class="col-sm-4 my-1">
                <input type="text" class="form-control" name="busqueda">
            </div>
            <div class="col-auto my-1">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </div>
    </form> --}}
    @if (session('sucess'))
    <h6 class="alert alert-success">{{ session('sucess')}}</h6>
    @endif
    @if (session('error'))
        <h6 class="alert alert-danger">>{{ session('error') }}</h6>
    @endif
    <div>
        <table id="asistencia" class="table table-striped" style="width:100%">

            <thead class="bg-ptimary text-black">
                <th scope="col">#</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">MATRICULA</th>
                <th scope="col">CARRERA</th>
                <th scope="col">SEMESTRE</th>
                <th scope="col">GRUPO</th>
                {{-- <th scope="col">Imagen</th> --}}
                <th scope="col">FECHA Y HORA DE ENTRADA</th>
                <th scope="col">FECHA Y HORA DE SALIDA</th>
                <th scope="col">ACCIONES</th>
            </thead>

            <tbody>
                @if (count($alumno)<=0)
                    <tr >
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="3" align="center">NO HAY ASISTENCIAS REGISTRADAS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @else

                @foreach ($alumno as $alumnos )
                <tr>
                    <td>{{$alumnos->id}}</td>
                    <td>{{$alumnos->Nombre}}</td>
                    <td>{{$alumnos->Matricula}}</td>
                    <td>{{$alumnos->Carrera}}</td>
                    <td>{{$alumnos->Semestre}}</td>
                    <td>{{$alumnos->Grupo}}</td>
                    <td>{{$alumnos->FechaIngreso}}</td>
                    <td>{{$alumnos->FechaSalida}}</td>

                    <td> <div class="action_buttons">
                        <form>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit" onclick="addformAllEditar({{$alumnos}})">Modificar</button>
                        </form>
                        <br>
                        <form>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete" onclick="addformIDEliminar({{$alumnos->id}})">
                                Eliminar
                              </button>
                        </form>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $alumno->appends(['busqueda'=>$busqueda])}}
        </div>
    </div>


@include('Asistencia.create')
@include('Asistencia.edit')
@include('Asistencia.delete')

<script>
    function addformIDEliminar(id){
        var contenedorDelete = document.getElementById("Delete");
        elementoID = contenedorDelete.querySelector("#id").value = id;
        //console.log("prueba de modal eliminar")
    }

    function addformAllEditar(data){
        var contenedorDelete = document.getElementById("Edit");
        contenedorDelete.querySelector("#id").value = data["id"];
        contenedorDelete.querySelector("#Nombre").value = "" + data["Nombre"];
        contenedorDelete.querySelector("#Matricula").value = "" + data["Matricula"];
        contenedorDelete.querySelector("#Carrera").value = "" + data["Carrera"];
        contenedorDelete.querySelector("#Semestre").value = data["Semestre"];
        contenedorDelete.querySelector("#Grupo").value = "" + data["Grupo"];
        //contenedorDelete.querySelector("#FechaIngreso").value = data["FechaIngreso"];
        //console.log(data)


        if (data.hasOwnProperty('FechaIngreso') || data['FechaIngreso'] !== '') {
            var ingreso = new Date(data['FechaIngreso']);
            ingreso.setMilliseconds(null)
            ingreso.setSeconds(null)
            contenedorDelete.querySelector("#FechaIngreso").value = ingreso.toISOString().slice(0, -1);
        }

        if (!data.hasOwnProperty('FechaSalida') || data['FechaSalida'] === '') {
            var salida = new Date(data['FechaSalida']);
            salida.setMilliseconds(null)
            salida.setSeconds(null)
            contenedorDelete.querySelector("#FechaSalida").value = salida.toISOString().slice(0, -1);
        } else {
            var now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            now.setMilliseconds(null)
            now.setSeconds(null)
            contenedorDelete.querySelector("#FechaSalida").value = now.toISOString().slice(0, -1);
        }
        //console.log("prueba de modal editar")
    }


    $(document).ready(function () {
        var table = $('#asistencia').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'pdfHtml5',
                text: '<i class="fa-solid fa-file-pdf"></i> Guardar PDF',
                title: 'Lista de asistencia',
                exportOptions: {
                    modifier: {
                        page: 'current',
                    },
                    columns: [1, 2, 3, 4, 5, 6, 7]
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
