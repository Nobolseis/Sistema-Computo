@extends('layouts.layout')


@section('title', 'inicio')

@section('textoencabezado')

    <h1 style="text-align:center">CENTRO DE CÓMPUTO</h1>

@endsection
@section('contenido')
<center>
    <img src="{{ URL::asset('img/itchina.png') }}" width="50%" height="50%">
</center>
@endsection
