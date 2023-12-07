<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $asistencia = Asistencia::where('Matricula','LIKE','%'.$busqueda.'%')
            ->orWhere('Nombre', 'LIKE','%'.$busqueda.'%')
            ->orWhere('Carrera', 'LIKE','%'.$busqueda.'%')
            ->paginate(10);
        $datos = ['alumno' => $asistencia,
                'busqueda'=>$busqueda,];
        return view('Asistencia.Asistencia', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asistencia1 = request()->except('_token');
        Asistencia::insert($asistencia1);
        return redirect()->route('asistencia.index');
    }

    public function agregar_asistencia(Request $request){
        $validator = Validator::make($request->all(), [
            'Carrera' => 'required|string|max:100',
            'Matricula' => 'required|string|max:100',
            'Nombre' => 'required|string|max:100',
            'Semestre' => 'required|string|max:100',
            'Grupo' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return redirect()->route('asistencia.index')->withErrors($validator);
        }

        Asistencia::insert([
            'Nombre' => $request->Nombre,
            'Matricula' => $request->Matricula,
            'Carrera' => $request->Carrera,
            'Semestre' => $request->Semestre,
            'Grupo' => $request->Grupo
        ]);
        return redirect()->back()->with('sucess', 'Se agregó la asistencia correctamente.');
    }

    public function eliminar_asistencia(Request $request){
        Asistencia::destroy([$request->id]);
        return redirect()->back()->with('sucess', 'Se eliminó la asistencia correctamente.');
    }

    public function editar_asistencia(Request $request){
        $validator = Validator::make($request->all(), [
            'Carrera' => 'required|string|max:100',
            'Matricula' => 'required|string|max:100',
            'Nombre' => 'required|string|max:100',
            'Semestre' => 'required|string|max:100',
            'Grupo' => 'required|string|max:100',
        ]);

        if($validator->fails()) {
            return redirect()->route('asistencia.index')->withErrors($validator);
        }
        $asistencia = Asistencia::find($request->id);
        $asistencia->Nombre = $request->Nombre;
        $asistencia->Matricula = $request->Matricula;
        $asistencia->Carrera = $request->Carrera;
        $asistencia->Semestre = $request->Semestre;
        $asistencia->Grupo = $request->Grupo;
        $asistencia->FechaIngreso = $request->FechaIngreso;
        $asistencia->FechaSalida = $request->FechaSalida;
        $asistencia->save();
        return redirect()->back()->with('sucess', 'Se editó la asistencia correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }
}
