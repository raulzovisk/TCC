<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidaCorporal extends Model
{
    use HasFactory;

    protected $table = 'medidas_corporais';

    public $timestamps = false;

    protected $fillable = [
        'id_aluno', 'data_medida', 'peso', 'altura', 'cintura', 'quadril',
        'peito', 'braco_direito', 'braco_esquerdo', 'coxa_direita', 'coxa_esquerda',
        'gordura', 'genero', 'historico_medidas'
    ];

    protected $casts = [
        'data_medida' => 'date',
        'historico_medidas' => 'array',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
}
