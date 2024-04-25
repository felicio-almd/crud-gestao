<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'paginas',
        'estoque',
        'genero_id'
    ];

    public function generos() {
        return $this->belongsTo(Genero::class);
    }
}
