<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Vacunas extends Model
{
    use HasFactory;
    public $timestamps = true;
    static $rules = [
        'vacuna' => 'required',
        'duracion' => 'required'
    ];
    protected $fillable = [

    ];

    public function medicos()
    {
        return $this->hasOne(User::class, 'id', 'a_n_iduser');
    }
}
