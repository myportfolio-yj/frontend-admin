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
    ];
    static $rules = [
        'medicamento' => 'required',
        'descripcion' => 'required'
    ];

}
