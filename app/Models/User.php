<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_user';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'role_id',
        'Name',
        'Email',
        'Password',
    ];

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
