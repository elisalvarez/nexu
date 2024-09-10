<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
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
    protected $table = 'brands';
    /**
     * Nombre de la llave primaria de la tabla de datos.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'brand_id';
    /**
     * Atributos que pueden ser asignados en masa.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name'
    ];
}
