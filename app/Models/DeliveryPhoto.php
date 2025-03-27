<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryPhoto extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_delivery_photo';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Status_ID',
        'PhotoURL',
        'Type',
    ];

    // Relación con el modelo OrderStatus
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'Status_ID');
    }
}
