<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
    use HasFactory;

    protected $table = 'qrv_recetas';
    public $timestamps = true;
    static $rules = [
        'n_medica' => 'required',
        'v_dosis' => 'required',
        'n_cantidad' => 'required',
        'v_indicaciones' => 'required',
    ];
    public function atencion()
    {
        return $this->belongsTo(Atenciones::class, 'n_atencion', 'id');
    }

    public function medicamento()
    {
        return $this->hasOne(Medicamentos::class, 'id', 'n_medica');
    }
}
