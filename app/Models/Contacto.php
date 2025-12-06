<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
     use HasFactory;

    // Nombre de la tabla existente
    protected $table = 'contactos';

    // Columnas que se pueden llenar masivamente
    protected $fillable = ['nombre', 'correo'];

    // Si quieres usar timestamps (create y update), se mantiene true
    public $timestamps = false;
}
