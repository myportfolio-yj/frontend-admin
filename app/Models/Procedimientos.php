<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimientos extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
    ];
    static $rules = [
        'procedimiento' => 'required',
        'descripcion' => 'required',
    ];

}
