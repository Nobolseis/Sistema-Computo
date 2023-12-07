<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos1['Mantenimiento']=Mantenimiento::paginate(10);
        return view('Mantenimiento.Mantenimiento',$datos1);
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

        $campos=[
            'NumeroInventario'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'NumSerie'=>'required|string|max:100',
            'Caracteristicas'=>'required|string|max:100',
            'Problema'=>'required|string|max:100',
            'Diagnostico'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            'Foto.required'=>'foto es requerida'

        ];

        $this->validate($request, $campos,$mensaje);


        $equipos2 = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $equipos2['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Mantenimiento::insert($equipos2);
        return redirect()->route('mantenimiento')->with('sucess', 'EL EQUIPO SE AGREGO CORRECTAMENTE.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $equipos2edit=Mantenimiento::findOrFail($id);
        return view('Mantenimiento.Edit', compact('equipos2edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'NumeroInventario'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'NumSerie'=>'required|string|max:100',
            'Caracteristicas'=>'required|string|max:100',
            'Problema'=>'required|string|max:100',
            'Diagnostico'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',

        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            'foto.required'=>'foto es requerida'

        ];

        $this->validate($request, $campos,$mensaje);




        $equipos2 = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
             $equipos2edit=Mantenimiento::findOrFail($id);
             Storage::delete('public/'.$equipos2edit->Foto);
             $equipos2['Foto']=$request->file('Foto')->store('uploads','public');
             }


        Mantenimiento::where('id','=',$id)->update($equipos2);
        $equipos2edit=Mantenimiento::findOrFail($id);
        //return view('Mantenimiento.Edit', compact('equipos2edit'));
        return redirect('Mantenimiento')->with('sucess','EL EQUIPO SE MODIFICO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipos2edit=Mantenimiento::findOrFail($id);

        if(Storage::delete('public/'.$equipos2edit->Foto)){

            Mantenimiento::destroy($id);
        }
        return redirect('Mantenimiento')->with('sucess', 'EL EQUIPO SE ELIMINO CORRECTAMEN.');
    }
}
