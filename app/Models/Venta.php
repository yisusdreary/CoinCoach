<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="ventas";
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'id_cliente',
        'id_criptomoneda',
        'fecha_venta',
        'cantidad_de_venta',
        'total',
    ];
}
