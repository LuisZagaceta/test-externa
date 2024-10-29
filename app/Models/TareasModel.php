<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TareasModel extends Model {

    use HasFactory;

    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    public $incrementing = true;
    public $timestamps = false;

    public function estado(): HasOne {
        return $this->hasOne(EstadosModel::class, 'id_estado', 'id_estado');
    }
}
