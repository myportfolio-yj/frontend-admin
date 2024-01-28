<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluqueros extends Model
{
    use HasFactory;

    public $timestamps = true;
    static $rules = [
        'nombres' => 'required',
        'email' => 'required',
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
