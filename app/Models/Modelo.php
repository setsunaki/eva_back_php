<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    
    protected $table = 'modelo';

    public function marca(){
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'id_modelo');
    }
}
