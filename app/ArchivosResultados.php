<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivosResultados extends Model
{

    protected $table="archivos_resultados";

    protected $fillable = [
        'id','id_resultado','nombre','archivo','usuario'
    ];
    //
}
