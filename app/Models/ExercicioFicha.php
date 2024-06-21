<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class ExercicioFicha extends Model
{
    use HasFactory;

    protected $table = 'exercicio_ficha';

    protected $fillable = ['id_exercicio', 'id_ficha'];

    public function exercicio()
    {
        return $this->belongsTo(Exercicio::class, 'id_exercicio');
    }

    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'id_ficha');
    }
}
