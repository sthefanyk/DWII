<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emprestimo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['aluno_id', 'livro_id'];

    public function aluno() {
        return $this->belongsTo('App\Models\Aluno');
    }

    public function livro() {
        return $this->belongsTo('App\Models\Livro');
    }
}
