<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Pet extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pets';

    protected $fillable = [
        'nombre',
        'especie',
        'raza',
        'edad',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
