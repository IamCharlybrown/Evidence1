<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_order';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Client_ID',
        'Status_ID',
        'InvoiceNumber',
        'DateTime',
        'DeliveryAddress',
        'Notes',
        'Delivery_Photo_ID',
    ];

    // Relación con el modelo Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_ID');
    }

    // Relación con el modelo OrderStatus
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'Status_ID');
    }

    // Relación con el modelo DeliveryPhoto
    public function deliveryPhoto()
    {
        return $this->belongsTo(DeliveryPhoto::class, 'Delivery_Photo_ID');
    }
}
