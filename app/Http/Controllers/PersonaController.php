<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return Persona::where('estado', 'A')->get();
        return Persona::all();
    }

    public function store(Request $request)
    {
        // Persona::create($request->all());
        $persona = new Persona();
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->sexo = $request->sexo;
        $persona->fecha = $request->fecha;

        $persona->save();
        return $persona;
    }

    // public function show($id)
    // {

    // }

    // public function edit($id)
    // {

    // }

    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);

        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->sexo = $request->sexo;
        $persona->fecha = $request->fecha;

        $persona->save();
        return $persona;
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();
    }
}
