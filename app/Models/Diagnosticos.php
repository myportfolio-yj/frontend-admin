<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosticos extends Model
{
    use HasFactory;

    protected $table = 'qrv_diagnosticos';
    public $timestamps = true;
    static $rules = [
        'diagnostico' => 'required',
        'detalle' => 'required'
    ];
    protected $fillable = [
        'v_nombre',
        'v_apuntes',
        'a_n_iduser',
        'n_estado',
    ];


}
