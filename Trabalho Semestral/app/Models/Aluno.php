<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['matricula', 'nome', 'curso_id'];

    public function livro() {
        return $this->belongsToMany('\App\Models\Livro');
    }

    public function curso() {
        return $this->belongsTo('\App\Models\Curso');
    }
}
