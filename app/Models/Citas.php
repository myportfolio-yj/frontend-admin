<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    public $timestamps = true;
    static $rules = [
        'cliente' => 'required',
        'mascotas' => 'required',
        'tiposCita' => 'required',
        'empleados' => 'required',
        'fechas' => 'required',
        'turnos' => 'required',
        'observaciones' => 'required',
    ];

    protected $fillable = [
        'n_documento',
        'v_nombre',
        'v_apellido',
        'v_correo',
        'v_telefono',
        'v_telfijo',
        'n_tipodoc',
    ];

    public function tipo()
    {
        return $this->hasOne(TipoDoc::class, 'id', 'n_tipodoc');
    }
}
