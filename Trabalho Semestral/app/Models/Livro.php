<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo', 'autor', 'genero_id'];

    public function genero() {
        return $this->belongsTo('\App\Models\Genero');
    }
}
