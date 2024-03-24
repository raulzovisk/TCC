<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ficha extends Model
{
    use HasFactory;
    use SoftDeletes;

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
}
