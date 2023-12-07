<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['Equipos']=Equipos::paginate(10);
        return view('Equipos.Equipos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'Numero_de_inventario'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Num_serie'=>'required|string|max:100',
            'Caracteristicas'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $mensaje=[
            'required'=>':attribute es requerido',
            'foto.required'=>'foto es requerida'

        ];

        $this->validate($request, $campos,$mensaje);



        $dataEquipos = request()->except('_token');

        if($request->hasFile('foto')){
            $dataEquipos['foto']=$request->file('foto')->store('uploads','public');
        }

        Equipos::insert($dataEquipos);
        return redirect()->route('equipos')->with('sucess', 'EL EQUIPO SE AGREGO CORRECTAMENTE.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipoedit=Equipos::findOrFail($id);
        return view('Equipos.Edit', compact('equipoedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Numero_de_inventario'=>'required|string|max:100',
            'Marca'=>'required|string|max:100',
            'Modelo'=>'required|string|max:100',
            'Num_serie'=>'required|string|max:100',
            'Caracteristicas'=>'required|string|max:100',
            'Ubicacion'=>'required|string|max:100',

        ];

        $mensaje=[
            'required'=>':attribute es requerido',

        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request, $campos,$mensaje);



        $dataEquipos = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $equipoedit=Equipos::findOrFail($id);
            Storage::delete('public/'.$equipoedit->foto);
            $dataEquipos['foto']=$request->file('foto')->store('uploads','public');
        }

        Equipos::where('id','=',$id)->update($dataEquipos);
        $equipoedit=Equipos::findOrFail($id);
        //return view('Equipos.Edit', compact('equipoedit'));
        return redirect('equipos')->with('sucess','EL EQUIPO SE MODIFICO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $equipoedit=Equipos::findOrFail($id);
        if(Storage::delete('public/'.$equipoedit->foto)){
            Equipos::destroy($id);
        }
        return redirect('equipos')->with('sucess', 'EL EQUIPO SE ELIMINO CORRECTAMEN.');
    }
}
