<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';

    protected $fillable = ['altura', 'peso', 'genero', 'gordura', 'musculo', 'idade', 'id_user', 'historico',];

    protected $casts = [
        'historico' => 'array',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function fichas()
    {
        return $this->hasMany(Ficha::class, 'id_aluno');
    }

}
