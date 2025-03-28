<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla intermedia
    protected $table = '_order_product';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Order_ID',
        'Product_ID',
        'Quantity',
    ];

    // Relación con la tabla de pedidos
    public function order()
    {
        return $this->belongsTo(Order::class, 'Order_ID');
    }

    // Relación con la tabla de productos
    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }
}
