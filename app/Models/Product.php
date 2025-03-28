<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Indicar el nombre de la tabla
    protected $table = '_product';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'Name',
        'Description',
        'Price',
        'Stock',
        'Category',
        'Created_By',
    ];

    // Relación con el usuario que creó el producto
    public function user()
    {
        return $this->belongsTo(User::class, 'Created_By');
    }

    // Relación con pedidos (muchos a muchos)
    public function orders()
    {
        return $this->belongsToMany(Order::class, '_order_product', 'Product_ID', 'Order_ID')
                    ->withPivot('Quantity')
                    ->withTimestamps();
    }
}
