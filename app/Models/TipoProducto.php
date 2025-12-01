<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';
    
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Relación: Un tipo de producto tiene muchos productos
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'tipo_producto_id');
    }
}
