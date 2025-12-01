<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    
    protected $fillable = [
        'tipo_producto_id',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'codigo_barras',
        'imagen'
    ];

    protected $casts = [
        'precio' => '',
        'stock' => ''
    ];

    /**
     * Relación: Un producto pertenece a un tipo de producto
     */
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'tipo_producto_id');
    }
}