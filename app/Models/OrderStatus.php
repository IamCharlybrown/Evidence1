<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_order_status';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Status',
    ];

}
