<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf_Gestion</title>

</head>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3f708d;
        }
    </style>
</head>
<body>

    <center >

        <img src="{{public_path('img/5.png')}}" width="300px" height="60px">
        <img src="{{public_path('img/itchina.png')}}" width="95px" height="60px">
    </center>
<center><h1>Gestion de información. </h1></center>

<br>

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

            </thead>

            <tbody>
                @foreach ( $datos as $Equipo )
                <tr>
                    <td>{{$Equipo->id}}</td>
                    <td>{{$Equipo->Numero_de_inventario}}</td>
                    <td>{{$Equipo->Marca}}</td>
                    <td>{{$Equipo->Modelo}}</td>
                    <td>{{$Equipo->Num_serie}}</td>
                    <td>{{$Equipo->Caracteristicas}}</td>
                    <td>{{$Equipo->Ubicacion}}</td>




                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <hr>
<div>
    <table id="aistencia" class="table table-striped table-bordered mt-12 " style="width:100%">

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
        </thead>
        <tbody>
            @foreach ($datos1 as $equipos )


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
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
