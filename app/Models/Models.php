<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;
    /**
     * Gestiona las marcas de tiempo (Fecha de creación y actualización).
     *
     * @var boolean $timestamps
     */
    public $timestamps = true;
    /**
     * Nombre de la tabla de datos para este modelo.
     *
     * @var string $table
     */
    protected $table = 'models';
    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'sku',
        'name',
        'average_price',
        'brand_id'
    ];
    
}
