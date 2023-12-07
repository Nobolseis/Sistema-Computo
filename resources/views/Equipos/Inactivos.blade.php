@extends('layouts.layout')


@section('title', 'Equipos')
@section('textoencabezado')

<h1 style="text-align:center">EQUIPOS DE CÓMPUTO INACTIVOS</h1>

@endsection
@section('contenido')

    <div>
        <table id="aistencia" class="table table-striped table-bordered mt-12 " style="width:100%">

            <thead class="bg-ptimary text-black">
                <th scope="col">#</th>
                <th scope="col">Numero de inventrio</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Nu. Serie</th>
                <th scope="col">Caracteristicas del equipo</th>
                <th scope="col">Ubicación en sala</th>
                <th scope="col">Descripcion del problema</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Foto</th>
                <th scope="col">ACCIONES</th>
            </thead>

            <tbody>
                <tr>
                    <td>01</td>
                    <td>TEC-5569-54</td>
                    <td>Lenovo</td>
                    <td>H4</td>
                    <td>MV219</td>
                    <td>Prosesador intel I5, memoria 8G, Disco HDD</td>
                    <td>Sala A</td>
                    <td>El equipo dejo de encender</td>
                    <td>Se le encontro al quipo un Bus dañado, Se posedio a la reaparacion la cual fue todo un exito</td>
                    <td><img src="{{ URL::asset('img/12.png') }}" width="60%" height="60%"></td>
                    <td> <div class="action_buttons">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Inac">
                            Servicio
                          </button>
                        <form>

                        </form>
                        <hr>
                        <form>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" >
                                Activar
                              </button>
                        </form>
                </tr>
            </tbody>
        </table>
    </div>

    @include('Equipos.Modal_Inactivos')

@endsection

