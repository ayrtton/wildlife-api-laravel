<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'specie',
        'scientific_name',
        'image_url',
        'description',
        'references',
        'animal_class_id',
    ];

    public function animalClass() {
        return $this->belongsTo(AnimalClass::class);
    }
}
