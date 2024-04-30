<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categoria';

    protected $fillable = ['nome'];

    public function exercicios()
{
    return $this->hasMany(Exercicio::class, 'id_categoria');
}



}
