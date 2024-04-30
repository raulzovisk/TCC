<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercicio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'exercicio';

    protected $fillable = ['nome', 'series', 'repeticoes', 'descricao', 'id_categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function fichas()
    {
        return $this->belongsToMany(Ficha::class, 'exercicio_ficha', 'id_exercicio', 'id_ficha');
    }

}
