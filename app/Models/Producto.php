<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $table = 'producto';
    
    protected $guarded = [
        'tipo_producto_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'codigo_barras',
        'imagen'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer'
    ];

    /**
     * Relación: Un producto pertenece a un tipo de producto
     */
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'tipo_producto_id');
    }




    