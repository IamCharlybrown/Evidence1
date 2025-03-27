<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    
    protected $table = '_client';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Name',
        'Client_Number',
        'FiscalData',
    ];

    // Si no se quiere que se manejen las columnas 'created_at' y 'updated_at', descomentar esta línea
    // public $timestamps = false;
}
