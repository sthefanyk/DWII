<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome', 'email', 'siape', 'eixo_id', 'ativo'];

    public function disciplina() {
        return $this->hasMany('\App\Models\Disciplina');
    }
    
    public function eixo() {
        return $this->belongsTo('\App\Models\AreaEixo');
    }
}
