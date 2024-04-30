<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ficha extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ficha';

    protected $fillable = ['objetivo', 'descricao', 'data', 'id_instrutor', 'id_aluno'];

    public function instrutor()
    {
        return $this->belongsTo(Instrutor::class, 'id_instrutor');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class, 'exercicio_ficha', 'id_ficha', 'id_exercicio');
    }
    
    

}
