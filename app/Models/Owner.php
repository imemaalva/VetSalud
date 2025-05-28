<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Owner extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'owners';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
