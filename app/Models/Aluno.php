<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'aluno';

    protected $fillable = ['id_user', 'idade'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function medidasCorporais()
    {
        return $this->hasMany(MedidaCorporal::class, 'id_aluno');
    }

    public function fichas()
    {
        return $this->hasMany(Ficha::class, 'id_aluno');
    }
}
