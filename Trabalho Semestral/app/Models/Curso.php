<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome', 'sigla'];

    public function aluno() {
        return $this->hasMany('\App\Models\Aluno');
    }
}
