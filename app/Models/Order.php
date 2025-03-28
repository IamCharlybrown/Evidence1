<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = '_order';

    protected $fillable = [
        'Client_ID',
        'Status_ID',
        'InvoiceNumber',
        'DateTime',
        'DeliveryAddress',
        'Notes',
        'Delivery_Photo_ID',
    ];

    // Relación con el cliente
    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_ID');
    }

    // Relación con el estado del pedido
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'Status_ID');
    }

    // Relación con la foto de entrega
    public function deliveryPhoto()
    {
        return $this->belongsTo(DeliveryPhoto::class, 'Delivery_Photo_ID');
    }

    // Relación con productos (muchos a muchos)
    public function products()
    {
        return $this->belongsToMany(Product::class, '_order_product', 'Order_ID', 'Product_ID')
                    ->withPivot('Quantity')
                    ->withTimestamps();
    }
}
