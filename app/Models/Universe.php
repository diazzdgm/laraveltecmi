<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    protected $table = 'universe';
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function superheroes()
    {
        return $this->hasMany(SuperHero::class);
    }
}
