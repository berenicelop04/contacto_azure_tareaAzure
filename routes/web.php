<?php

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Obtiene TODOS los contactos ordenados del más nuevo al más viejo
    $contactos = Contacto::orderBy('id', 'desc')->get();
    
    // Pasa los contactos a la vista
    return view('formulario_contacto', ['contactos' => $contactos]);
});

Route::post('/save', function (Request $request) {
    // Validación simple
    $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|max:255',
    ]);

    // Guardar en la tabla contactos
    Contacto::create([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
    ]);

    return redirect('/')->with('success', 'Contacto guardado correctamente');
});