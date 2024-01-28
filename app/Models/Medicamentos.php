<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    use HasFactory;

    protected $table = 'qrv_medicamentos';
    public $timestamps = true;
    protected $fillable = [
        'v_nombre',
        'v_apuntes',
        'a_n_iduser',
        'n_estado',
    ];
    static $rules = [
        'v_nombre' => 'required',
        'v_apuntes' => 'required'
    ];

    public function medicos()
    {
        return $this->hasOne(User::class, 'id', 'a_n_iduser');
    }

    public function recetas()
    {
        return $this->belongsTo(Recetas::class, 'n_medica', 'id');
    }
}
