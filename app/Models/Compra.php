<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="compras";
    protected $primaryKey = 'id_compra';
    protected $fillable = [
        'id_cliente',
        'id_criptomoneda',
        'fecha_compra',
        'cantidad_de_compra',
        'total',
    ];
}
