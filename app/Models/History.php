<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class History extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'histories';

    protected $fillable = [
        'pet_id',
        'vet_id', // el usuario veterinario
        'fecha',
        'descripcion',
        'tratamiento',
        'diagnostico',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function getVeterinarioAttribute()
    {
        return User::find($this->vet_id);
    }
}
