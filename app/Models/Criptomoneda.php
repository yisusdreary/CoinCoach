<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Criptomoneda extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "criptomonedas";
    protected $primaryKey = 'id_criptomoneda';
    protected $fillable = [
        'nombre_c',
        'precio_actual',
        'precio_anterior',
    ];
}
