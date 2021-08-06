<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Persona;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return Contacto::all();
    }

    public function persona(Persona $persona)
    {
        $contacto = $persona->contactos;
        return $contacto;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $contacto = new Contacto();
        $contacto->telefono = $request->telefono;
        $contacto->tipo_telefono = $request->tipo_telefono;
        $contacto->email = $request->email;

        $contacto->save();
        return $contacto;
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $contacto = Contacto::find($id);

        $contacto->telefono = $request->telefono;
        $contacto->tipo_telefono = $request->tipo_telefono;
        $contacto->email = $request->email;

        $contacto->save();
        return $contacto;
    }

    public function destroy($id)
    {
        $persona = Contacto::find($id);
        $persona->delete();
    }
}
