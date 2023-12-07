<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;

    public function author(): Attribute
    {
        return new Attribute(
            get: fn () => $this->author,
            set: fn ($value) => $this->author = $value,
        );
    }
}
