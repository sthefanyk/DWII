<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaEixo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome', 'descricao'];

    public function curso() {
        return $this->hasMany('\App\Models\Curso');
    }

    public function professor() {
        return $this->hasMany('\App\Models\Professor');
    }
}
