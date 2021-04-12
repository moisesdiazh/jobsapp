<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{

    protected $fillable = [

        'titulo', 'imagen', 'descripcion', 'skills', 'categoria_id', 'experiencia_id', 'ubicacion_id', 'salario_id'
    ];


    //relacion 1 a 1 categoria y vacante
    public function categoria()
    {

        return $this->belongsTo(Categoria::class);
    }

    //relacion 1 a 1 salario y vacante
    public function salario()
    {

        return $this->belongsTo(Salario::class);
    }

    //relacion 1 a 1 ubicacion y vacante
    public function ubicacion()
    {

        return $this->belongsTo(Ubicacion::class);
    }

    //relacion 1 a 1 experiencia y vacante
    public function experiencia()
    {

        return $this->belongsTo(Experiencia::class);
    }

    //relacion 1 a 1 reclutador y vacante
    public function reclutador()
    {

        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion 1:n vacante y candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
