<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    use HasFactory;

    protected $table = 'qrv_pacientes';
    public $timestamps = true;
    static $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fechaNacimiento' => 'required',
        'esterilizado' => 'required',
    ];


    protected $fillable = [
        'v_identifica',
        'v_nombre',
        'v_apellido',
        'd_fecnaci',
        'n_sexo',
        'n_raza',
        'n_cliente',
    ];

    public function sexo()
    {
        return $this->hasOne(Sexo::class, 'id', 'n_sexo');
    }

    public function raza()
    {
        return $this->hasOne(Razas::class, 'id', 'n_raza');
    }

    public function cliente()
    {
        return $this->hasOne(Clientes::class, 'id', 'n_cliente');
    }

    public function alergias()
    {
        return $this->belongsToMany(Alergias::class, 'qrv_paciente_has_alergias', 'n_paciente', 'n_alergia');
    }

    public function vacunas()
    {
        return $this->belongsToMany(Vacunas::class, 'qrv_paciente_has_vacuna', 'n_paciente', 'n_vacuna');
    }
}
