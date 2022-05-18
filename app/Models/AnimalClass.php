<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function animals() {
        return $this->hasMany(Animal::class);
    }
}
