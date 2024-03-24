<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instrutor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'instrutor';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
