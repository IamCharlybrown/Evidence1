<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = '_user';

    protected $fillable = [
        'role_id',
        'Name',
        'Email',
        'Password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relación con productos creados por el usuario
    public function products()
    {
        return $this->hasMany(Product::class, 'Created_By');
    }
}
