<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_role';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Name',
    ];
}
